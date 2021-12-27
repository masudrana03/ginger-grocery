<?php

namespace App\Http\Controllers;

use App\Models\ContactWithUs;
use App\Http\Requests\StoreContactWithUsRequest;
use App\Http\Requests\UpdateContactWithUsRequest;

class ContactWithUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreContactWithUsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactWithUsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContactWithUs  $contactWithUs
     * @return \Illuminate\Http\Response
     */
    public function show(ContactWithUs $contactWithUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContactWithUs  $contactWithUs
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactWithUs $contactWithUs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContactWithUsRequest  $request
     * @param  \App\Models\ContactWithUs  $contactWithUs
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContactWithUsRequest $request, ContactWithUs $contactWithUs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactWithUs  $contactWithUs
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactWithUs $contactWithUs)
    {
        //
    }
}
