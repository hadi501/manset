<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\Production;

class ProductionController extends Controller
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
        $orders    = Order::All();
        $customers = Order::select([DB::raw("customer as customer"), DB::raw("SUM(amount) as amount")])->groupBy('customer')->get();

        return view('production.input',['customers' => $customers, 'orders' => $orders]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Get the specified date for display.
     */
    public function getDetail(){

        return view('production.getdetail');
    
    }

     /**
     * Get the specified date for display.
     */
    public function detail(Request $request){

        $date = $request->date;

        return view('production.detail', ['date' => $date]);
    
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
        return view('production.edit')->with('id', $id);
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
