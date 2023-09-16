<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FinishingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('finishing.input');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Get the specified date for display.
     */
    public function getDetail(){

        return view('finishing.getdetail');
    
    }

     /**
     * Get the specified date for display.
     */
    public function detail(Request $request){

        $date = $request->date;

        return view('finishing.detail', ['date' => $date]);
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('finishing.edit')->with('id', $id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
