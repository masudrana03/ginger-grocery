<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\ContactInfo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ContactWithUs;
use RealRashid\SweetAlert\Facades\Alert;

class ContactWithUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactInfo = ContactInfo::all();
        $contactMassage = ContactWithUs::where('status', 0)->get();

        return view('backend.contacts.index', compact('contactInfo', 'contactMassage'));
    }


    public function contactMassage()
    {
        return view('backend.contacts.massage-index');
    }


    /**
     * @param Request $request
     * @return void
     */
    public function allContactsMassage(Request $request)
    {
        $columns = [
            0 => 'id',
            1 => 'name',
            2 => 'email',
            3 => 'phone',
            4 => 'subject',
            5 => 'massage',
            6 => 'created_at',
            7 => 'id',
        ];

        $totalData = ContactWithUs::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir   = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $contacts = ContactWithUs::offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();
        } else {
            $search = $request->input('search.value');

            $contacts =  ContactWithUs::where('id','LIKE',"%{$search}%")
                            ->orWhere('name', 'LIKE',"%{$search}%")
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();

            $totalFiltered = ContactWithUs::where('id','LIKE',"%{$search}%")
                                ->orWhere('name', 'LIKE',"%{$search}%")
                                ->count();
        }

        $data = [];

        if (!empty($contacts)) {
            foreach ($contacts as $contact) {
                $show   =  route('admin.contacts.show', $contact->id);
                $delete =  route('admin.contacts.destroy', $contact->id);
                $token  =  csrf_token();
                $contactEye = $contact->status == 0 ? 'eye-slash' : 'eye';

                $nestedData['id']         = $contact->id;
                $nestedData['name']       = $contact->name;
                $nestedData['email']      = $contact->email;
                $nestedData['phone']      = $contact->phone;
                $nestedData['subject']    = $contact->subject;
                $nestedData['massage']    = Str::limit($contact->massage, 20);
                $nestedData['created_at'] = $contact->created_at->format('d-m-Y');
                $nestedData['actions']    = "
                    &emsp;<a href='{$show}' title='DETAILS' ><span class='far fa-{$contactEye}'></span></a>
                    &emsp;<a href='#' onclick='deletePromo({$contact->id})' title='DELETE' ><span class='fas fa-trash'></span></a>
                    <form id='delete-form-{$contact->id}' action='{$delete}' method='POST' style='display: none;'>
                    <input type='hidden' name='_token' value='{$token}'>
                    <input type='hidden' name='_method' value='DELETE'>
                    </form>
                    ";
                $data[] = $nestedData;
            }
        }

        $json_data = [
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        ];

        echo json_encode($json_data);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContactWithUs  $contactWithUs
     * @return \Illuminate\Http\Response
     */
    public function show(ContactWithUs $contact)
    {
        if($contact->status == false )
        {
            $contact->status = true;
            $contact->save();
        }

        return view('backend.contacts.view', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContactInfo  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactInfo $contact)
    {
        $countries = Country::all();

        return view('backend.contacts.edit', compact('contact', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\ContactInfo  $contact
     */
    public function update(Request $request, ContactInfo $contact)
    {
        $request->validate( [
            'name'       => 'required',
            'email'      => 'required',
            'phone'      => 'required',
            'country_id' => 'required',
            'state'      => 'required',
            'city'       => 'required',
            'zip'        => 'required',
            'address'    => 'required',
            'latitude'   => 'required',
            'longitude'  => 'required'
        ]);

        // return $request;
        $request = $request->all();
        $contact->update( $request );

        Alert::toast('Contact Info successfully updated', 'success');

        return redirect()->route('admin.contacts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactWithUs  $contactWithUs
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactWithUs $contact)
    {
        $contact->delete();

       toast('Delivery Man successfully deleted', 'success');

       return back();
    }


    public function getCoordinates($id){
        $zone = ContactInfo::selectRaw("*,ST_AsText(ST_Centroid(`coordinates`)) as center")->findOrFail($id);
        $data = formatCoordiantes($zone->coordinates[0]);
        $center = (object)['lat'=>(float)trim(explode(' ',$zone->center)[1], 'POINT()'), 'lng'=>(float)trim(explode(' ',$zone->center)[0], 'POINT()')];
        return response()->json(['coordinates'=>$data, 'center'=>$center]);
    }
}
