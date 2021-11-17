<?php

namespace App\Http\Controllers;

use App\Models\Point;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class PointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $points = Point::all();
        
        return view('backend.settings.loyalty_card.index', compact('points'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function show(Point $point)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function edit(Point $point)
    {
        return view('backend.settings.loyalty_card.edit', compact('point'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Point $point)
    {
        $this->validate($request, [
            'purchase_target' => 'required|int',
            'points' => 'required|int'
        ]);

        $point->update($request->all());

        toast('Product successfully updated', 'success');

        return redirect()->route('points.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function destroy(Point $point)
    {
        //
    }

    /**
     * Update points status
     *
     * @param Banner $banner
     * @return void
     */
    public function updateStatus(Point $point)
    {
        $point->update([
            'status' => $point->status == 'Active' ? 'Inactive' : 'Active'
        ]);

        toast( 'Status successfully updated', 'success' );

        return redirect()->back();
    }

    /**
     * Update points settings
     *
     * @param Request $request
     */
    public function settingsUpdate(Request $request)
    {
        $this->validate($request, [
            'loyalty_points' => 'required',
            'loyalty_points_value' => 'required'
        ]);

        foreach ($request->all() as $key => $value) {
            Setting::where('key', $key)->update(['value' => $value]);
        }

        toast('Points settings successfully updated', 'success');

        Artisan::call('cache:clear');

        return back();
    }
}
