<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.faqs.index');
    }

    /**
     * Display a listing Data Table.
     *
     * @return \Illuminate\Http\Response
     */
    public function getFaq(Request $request)
    {
        $columns = [
            0 => 'id',
            1 => 'question',
            2 => 'answer',
            3 => 'type',
            4 => 'status',
            5 => 'created_at',
            6 => 'id',
        ];

        $totalData = Faq::count();

        $totalFiltered = $totalData;

        $limit = $request->input( 'length' );
        $start = $request->input( 'start' );
        $order = $columns[$request->input( 'order.0.column' )];
        $dir   = $request->input( 'order.0.dir' );

        if ( empty( $request->input( 'search.value' )) ) {
            $faqs = Faq::offset( $start )
                        ->limit( $limit )
                        ->orderBy( $order, $dir )
                        ->get();
        } else {
            $search = $request->input( 'search.value' );

            $faqs = Faq::where( 'id', 'LIKE', "%{$search}%" )
                        ->orWhere( 'question', 'LIKE', "%{$search}%" )
                        ->offset( $start )
                        ->limit( $limit )
                        ->orderBy( $order, $dir )
                        ->get();

            $totalFiltered = Faq::where( 'id', 'LIKE', "%{$search}%" )
                                ->orWhere( 'question', 'LIKE', "%{$search}%" )
                                ->count();
        }

        $data = [];

        if ( !empty( $faqs ) ) {
            foreach ( $faqs as $faq ) {
                $updateStatus = route('admin.faqs.update_status', $faq->id );
                $edit         = route('admin.faqs.edit', $faq->id );
                $delete       = route('admin.faqs.destroy', $faq->id );
                $token        = csrf_token();
                $class        = $faq->status == 'Active' ? 'status_btn' : 'status_btn_danger';

                $nestedData['id']         = $faq->id;
                $nestedData['question']   = Str::limit($faq->question, 20);
                $nestedData['answer']     = Str::limit($faq->answer, 20);
                $nestedData['type']       = $faq->type;
                $nestedData['status']     = "<a href='javascript:void(0)' data-href='{$updateStatus}' data-toggle='tooltip' title='Change status' class='{$class}' onclick='ChangeFaqStatus({$faq->id})' id='faqStatus-{$faq->id}'>$faq->status</a>";
                $nestedData['created_at'] = $faq->created_at->format('d-m-Y');
                $nestedData['actions']    = "
                    &emsp;<a href='{$edit}' title='EDIT' ><span class='far fa-edit'></span></a>
                    &emsp;<a href='#' onclick='deleteBanner({$faq->id})' title='DELETE' ><span class='fas fa-trash'></span></a>
                    <form id='delete-form-{$faq->id}' action='{$delete}' method='POST' style='display: none;'>
                    <input type='hidden' name='_token' value='{$token}'>
                    <input type='hidden' name='_method' value='DELETE'>
                    </form>
                    ";
                $data[] = $nestedData;
            }
        }

        $json_data = [
            "draw"            => intval( $request->input( 'draw' ) ),
            "recordsTotal"    => intval( $totalData ),
            "recordsFiltered" => intval( $totalFiltered ),
            "data"            => $data,
        ];

        echo json_encode( $json_data );
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'question' => 'required',
            'answer'   => 'required',
            'type'     => 'required'
        ]);

        $faq = new Faq();
        $faq->question = $request->question;
        $faq->answer   = $request->answer;
        $faq->type     = $request->type;
        $faq->status   = $request->status;
        $faq->save();

        Alert::toast('FAQ successfully created', 'success');

        return redirect()->route('admin.faqs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        return view('backend.faqs.edit', compact('faqs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faq $faq)
    {
        $this->validate($request, [
            'question' => 'required|unique:units,name,'. $faq->id,
            'answer'   => 'required',
            'type'     => 'required'
        ]);

        $faq = new Faq();
        $faq->question = $request->question;
        $faq->answer   = $request->answer;
        $faq->type     = $request->type;
        $faq->status   = $request->status;
        $faq->save();

        Alert::toast('FAQ successfully created', 'success');

        return redirect()->route('admin.faqs.index');
    }

    /**
     * Update banner status
     *
     * @param Faq $faq
     * @return void
     */
    public function updateStatus(Faq $faq)
    {
        $faq->update([
            'status' => $faq->status == 'Active' ? 'Inactive' : 'Active'
        ]);

        toast( 'Status successfully updated', 'success' );

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        //
    }
}
