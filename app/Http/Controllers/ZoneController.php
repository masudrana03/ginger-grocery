<?php

namespace App\Http\Controllers;

use App\Models\Zone;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use Grimzy\LaravelMysqlSpatial\Types\Polygon;
use Grimzy\LaravelMysqlSpatial\Types\LineString;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.zones.index');
    }

    /**
     * @param Request $request
     * @return void
     */
    public function allZones(Request $request)
    {
        $columns = [
            0 => 'id',
            1 => 'name',
            1 => 'coordinates',
            1 => 'status',
            3 => 'created_at',
            4 => 'id'
        ];

        $totalData = Zone::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir   = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $zones = Zone::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');

            $zones =  Zone::where('id', 'LIKE', "%{$search}%")
                ->orWhere('title', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = Zone::where('id', 'LIKE', "%{$search}%")
                ->orWhere('title', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = [];

        if (!empty($zones)) {
            foreach ($zones as $zone) {
                $updateStatus = route('admin.zones.update_status', $zone->id);
                $edit         = route('admin.zones.edit', $zone->id);
                $delete       = route('admin.zones.destroy', $zone->id);
                $token        = csrf_token();
                $class        = $zone->status == 'Online' ? 'status_btn_b' : 'status_btn_danger_b';

                $nestedData['id']            = $zone->id;
                $nestedData['name']          = $zone->name;
                $nestedData['coordinates']   = $zone->coordinates;
                $nestedData['status']        = "<a href='javascript:void(0)' data-href='{$updateStatus}' data-toggle='tooltip' title='Change status' class='{$class}' onclick='ChangeZoneStatus({$zone->id})' id='zoneStatus-{$zone->id}'>$zone->status</a>";
                $nestedData['created_at']    = $zone->created_at->format('d-m-Y');
                $nestedData['actions']       = "
                    &emsp;<a href='{$edit}' title='EDIT' ><span class='far fa-edit'></span></a>
                    &emsp;<a href='#' onclick='deletePromo({$zone->id})' title='DELETE' ><span class='fas fa-trash'></span></a>
                    <form id='delete-form-{$zone->id}' action='{$delete}' method='POST' style='display: none;'>
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
        return view('backend.zones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:zones',
            'coordinates' => 'required',
        ]);

        $value = $request->coordinates;
        foreach (explode('),(', trim($value, '()')) as $index => $single_array) {
            if ($index == 0) {
                $lastcord = explode(',', $single_array);
            }
            $coords = explode(',', $single_array);
            $polygon[] = new Point($coords[0], $coords[1]);
        }
        $zone_id = Zone::all()->count() + 1;
        $polygon[] = new Point($lastcord[0], $lastcord[1]);
        $zone = new Zone();
        $zone->name = $request->name;
        $zone->coordinates = new Polygon([new LineString($polygon)]);
        // $zone->restaurant_wise_topic =  'zone_'.$zone_id.'_restaurant';
        // $zone->customer_wise_topic = 'zone_'.$zone_id.'_customer';
        // $zone->deliveryman_wise_topic = 'zone_'.$zone_id.'_delivery_man';
        $zone->save();

        Alert::toast('New Zone successfully created', 'success');
        return redirect()->route('admin.zones.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Zone $zone)
    {
        $zone = Zone::selectRaw("*,ST_AsText(ST_Centroid(`coordinates`)) as center")->findOrFail($zone->id);
        return view('backend.zones.edit', compact('zone'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Zone $zone)
    {
        $request->validate([
            'name' => 'required|unique:zones,name,' . $zone->id,
            'coordinates' => 'required',
        ]);
        $value = $request->coordinates;
        foreach (explode('),(', trim($value, '()')) as $index => $single_array) {
            if ($index == 0) {
                $lastcord = explode(',', $single_array);
            }
            $coords = explode(',', $single_array);
            $polygon[] = new Point($coords[0], $coords[1]);
        }
        $polygon[] = new Point($lastcord[0], $lastcord[1]);
        $zone->name = $request->name;
        $zone->coordinates = new Polygon([new LineString($polygon)]);
        // $zone->restaurant_wise_topic =  'zone_'.$id.'_restaurant';
        // $zone->customer_wise_topic = 'zone_'.$id.'_customer';
        // $zone->deliveryman_wise_topic = 'zone_'.$id.'_delivery_man';
        $zone->save();

        Alert::toast('Zone successfully updated', 'success');
        return redirect()->route('admin.zones.index');
    }

    /**
     * Update zone status
     *
     * @param Zone $zone
     * @return void
     */
    public function updateStatus(Zone $zone)
    {
        $zone->update([
            'status' => $zone->status == 'Online' ? 'Offline' : 'Online'
        ]);

        toast('Zone successfully updated', 'success');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Zone $zone)
    {
        $zone->delete();

        toast('Zone successfully deleted', 'success');

        return back();
    }


    public function get_coordinates($id)
    {
        $zone = Zone::selectRaw("*,ST_AsText(ST_Centroid(`coordinates`)) as center")->findOrFail($id);
        $data = format_coordiantes($zone->coordinates[0]);
        $center = (object)['lat' => (float)trim(explode(' ', $zone->center)[1], 'POINT()'), 'lng' => (float)trim(explode(' ', $zone->center)[0], 'POINT()')];
        return response()->json(['coordinates' => $data, 'center' => $center]);
    }

    public function zone_filter($id)
    {
        if ($id == 'all') {
            if (session()->has('zone_id')) {
                session()->forget('zone_id');
            }
        } else {
            session()->put('zone_id', $id);
        }

        return back();
    }


    public function get_all_zone_cordinates($id = 0)
    {
        $zones = Zone::where('id', '<>', $id)->active()->get();
        $data = [];
        foreach ($zones as $zone) {
            $data[] = format_coordiantes($zone->coordinates[0]);
        }
        return response()->json($data, 200);
    }
}
