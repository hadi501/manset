<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
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
        $operators = Employe::where('task', '1')->get();
        $orders    = Order::where('status', '0')->get();;
        $customers = Order::select([DB::raw("customer as customer"), DB::raw("SUM(amount) as amount")])->where('status', '0')->groupBy('customer')->get();

        return view('production.input',['customers' => $customers, 'orders' => $orders, 'operators' => $operators]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $amount = app(Controller::class)->getAmount($request->amount, $request->unit);
        
        $production = Production::updateOrCreate(
            ['date' => $request->date, 'machine_no' => $request->machine_no, 'shift' => $request->shift, 'order_id' => $request->order_id],
            ['employe_id' => $request->employe_id, 'amount' => $amount, 'status' => '0']
        );
        
        Alert::success('Success!', 'Data Telah diinput');
        return redirect('/production/create');
        
        // FUNGSI JIKA INGIN MENGGUNAKAN TIME LAGI
        
        // $shift = app(Controller::class)->getShift()[0];
        // $date = app(Controller::class)->getShift()[1];
        // $curr = Carbon::now()->format('H:i');

        // $id = Production::where('date', $request->date)
        //     ->where('machine_no', $request->machine_no)
        //     ->where('shift', $request->shift)
        //     ->where('order_id', $request->order_id)
        //     ->get();

        // if ($id->count() > 0) {
        //     // Jika ada baris dengan nilai yang sama
        //     $data = Production::find($id[0]->id);
        //     $data->amount = $data->amount + $amount;
        //     // $data->time = $data->time . " " . $curr;
        //     $data->save();

        //     Alert::success('Input!', 'Data Telah diinput');
        //     return redirect('/production/create');
        // } else {
        //     // Jika tidak ada baris dengan nilai yang sama
        //     $save = Production::create([
        //         'order_id'   => $request->order_id,
        //         'employe_id' => $request->employe_id,
        //         'shift'      => $request->shift,
        //         'machine_no' => $request->machine_no,
        //         'amount'     => $amount,
        //         'date'       => $request->date,
        //         // 'time'       => $curr,
        //         'status'    => '0'
        //     ]);

        //     Alert::success('Success!', 'Data Telah diinput');
        //     return redirect('/production/create');
        // }
    }

    /**
     * Get the specified date for display.
     */
    // public function getDetail(){

    //     return view('production.getdetail');
    
    // }

    public function detail(Request $request){

        $productions = Production::with(['order','employe'])->where('status', '0')->orderBy('id', 'desc')->get();

        return view('production.detail', ['productions' => $productions]);
    
    }

    public function history(Request $request){

        $productions = Production::with(['order','employe'])->where('status', '1')->orderBy('id', 'desc')->get();

        return view('production.history', ['productions' => $productions]);
    
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
        // $production->time   = $request->time;

        $production->save();

        Alert::success('Updated!', 'Data Telah diupdate');
        return redirect()->action([ProductionController::class, 'detail']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
