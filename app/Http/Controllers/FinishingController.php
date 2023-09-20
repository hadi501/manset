<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Finishing;
use App\Models\Employe;
use App\Models\Order;

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
        $orders     = Order::All();
        $customers  = Order::select([DB::raw("customer as customer"), DB::raw("SUM(amount) as amount")])->groupBy('customer')->get();
        $employes   = Employe::where('task', '2')->orWhere('task', '3')->get();

        return view('finishing.input', ['orders' => $orders, 'customers' => $customers,'employes' => $employes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $amount = app(Controller::class)->getAmount($request->amount, $request->unit);
        $date = Carbon::now()->format('Y-m-d');

        $finishing = Finishing::updateOrCreate(
            ['order_id' => $request->order_id, 'employe_id' => $request->employe_id, 'date' => $date],
            ['amount' => $amount]
        );

        return redirect('/finishing/create')->with('success', ['message' => 'Finishing Telah Diinput!']);
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
