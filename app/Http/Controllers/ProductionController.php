<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\Sock;
use App\Models\Color;
use App\Models\Employe;
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
        $operators = Employe::select('name')->where('task', '1')->get();
        $orders    = Order::All();
        $customers = Order::select([DB::raw("customer as customer"), DB::raw("SUM(amount) as amount")])->groupBy('customer')->get();

        return view('production.input',['customers' => $customers, 'orders' => $orders, 'operators' => $operators]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $amount = app(Controller::class)->getAmount($request->amount, $request->unit);
        $shift = app(Controller::class)->getShift()[0];
        $date = app(Controller::class)->getShift()[1];
        $curr = Carbon::now()->format('H:i');

        $id = Production::where('date', $date)
            ->where('machine_no', $request->machine_no)
            ->where('shift', $shift)
            ->where('order_id', $request->order_id)
            ->get();

        if ($id->count() > 0) {
            // Jika ada baris dengan nilai yang sama
            $data = Production::find($id[0]->id);
            $data->amount = $data->amount + $amount;
            $data->time = $data->time . " " . $curr;
            $data->save();

            return redirect('/production/create')->with('success', ['message' => 'Produksi Telah Diinput!']);
        } else {
            // Jika tidak ada baris dengan nilai yang sama
            $save = Production::create([
                'order_id'   => $request->order_id,
                'operator'   => $request->operator,
                'shift'      => $shift,
                'machine_no' => $request->machine_no,
                'amount'     => $amount,
                'date'       => $date,
                'time'       => $curr,
            ]);

            return redirect('/production/create')->with('success', ['message' => 'Produksi Telah Diinput!']);
        }
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
        $productions = Production::with('order')->where('date', $date)->get();
        $morning    = Production::select('operator')->groupBy('operator')->where('date', $date)->where('shift', '0')->get();
        $afternoon  = Production::select('operator')->groupBy('operator')->where('date', $date)->where('shift', '1')->get();
        $evening    = Production::select('operator')->groupBy('operator')->where('date', $date)->where('shift', '2')->get();

        return view('production.detail', ['date' => $date, 'productions' => $productions, 'morning' => $morning, 'afternoon' => $afternoon, 'evening' => $evening]);
    
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
        $socks  = Sock::all();
        $colors = Color::all();
        $production = Production::with('order')->find($id);

        // cek jika pesanan dalam jumlah lusin
        $a = $production->amount/12;

        if (!is_float($a)) {
            $production->amount = $a;
            $production->unit = 0; // 0 = Lusin
        } else {
            $production->unit = 1; // 1 = Pasang
        }

        return view('production.edit', ['production' => $production, 'socks' => $socks, 'colors' => $colors]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $amount = app(Controller::class)->getAmount($request->amount, $request->unit);
        
        $production = Production::find($request->id);
        $production->amount = $amount;
        $production->time   = $request->time;

        $production->save();

        return redirect('/production/get/detail')->with('success', ['message' => 'Data Berhasil Diedit!']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
