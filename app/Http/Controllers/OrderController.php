<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\History;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('order.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('order.input');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);

        $size   = app(OrderController::class)->getSize($request->size1, $request->size2);
        $amount = app(OrderController::class)->getAmount($request->amount, $request->unit);
        
        $data = Order::where([
            ['customer', '=', $request->customer],
            ['sock',     '=', $request->sock],
            ['color',    '=', $request->color],
            ['size',     '=', $size],
        ])->get();

        if($data->count() > 0){
            
            $order            = Order::find($data[0]->id);
            $order->amount    = $order->amount + $amount;
            $order->deadline  = $request->deadline;
            $order->price     = $order->price + $request->price;
            
            $order->save();

        }else{
            $save = Order::create([
                'customer'  => $request->customer,
                'sock'      => $request->sock,
                'color'     => $request->color,
                'size'      => $size,
                'amount'    => $amount,
                'date'      => Carbon::now()->toDateString(),
                'deadline'  => $request->deadline,
                'price'     => $request->price,
            ]);
        }

        return redirect('/order/create')->with('success', ['message' => 'Data Berhasil Diinput!']);
        
    }

    public function coba(){

        $size = app(OrderController::class)->getSize("31", "25");
        $amount = app(OrderController::class)->getAmount("10", "1");
        
        return $amount;
    }

    /**
     * Show the detail for the orders.
     */
    public function detail()
    {
        $orders    = Order::All();
        $customers = Order::select([DB::raw("customer as customer"), DB::raw("SUM(amount) as amount")])->groupBy('customer')->get();

        return view('order.detail',['orders' => $orders, 'customers' => $customers]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = Order::Find($id);

        // cek jika pesanan memiliki ukuran 2 dimensi
        $size = $order->size;    
        
        if (str_contains($size, "x")) {
            $order->size1 = strtok($size, "x");
            $order->size2 = substr(strrchr($size, 'x'), 1);    
        } else{
            $order->size1 = $size;
            $order->size2 = null;
        }

        // cek jika pesanan dalam jumlah lusin
        $a = $order->amount/12;

        if (!is_float($a)) {
            $order->amount = $a;
            $order->unit = 0; // 0 = Lusin
        } else {
            $order->unit = 1; // 1 = Pasang
        }

        return view('order.edit')->with('order', $order);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $size   = app(OrderController::class)->getSize($request->size1, $request->size2);
        $amount = app(OrderController::class)->getAmount($request->amount, $request->unit);

        $order            = Order::find($request->id);
        $order->customer  = $request->customer;
        $order->sock      = $request->sock;
        $order->color     = $request->color;
        $order->size      = $size;
        $order->amount    = $amount;
        $order->price     = $request->price;
        $order->deadline  = $request->deadline;
            
        $order->save();

        return redirect('/order/detail/1')->with('success', ['message' => 'Data Berhasil Diedit!']);
    }

    /**
     * Show the history for the orders.
     */
    public function history()
    {
        $orders     =  History::All();
        $customers  =  History::select([
                            DB::raw("customer as customer"),
                            DB::raw("SUM(amount) as amount")
                        ])->groupBy('customer')->get();

        return view('order.history',['customers' => $customers, 'orders' => $orders]);
    }

    public function finishOrder(Request $request){
        // dd($request);
        $order = Order::find($request->id);

        $save = History::create([
            'customer'   => $order->customer,
            'sock'       => $order->sock,
            'color'      => $order->color,
            'size'       => $order->size,
            'amount'     => $order->amount,
            'date'       => $order->date,
            'price'      => $order->price,
            'created_at' => Carbon::now()->toDateString()
        ]);

        $order->delete();

        return redirect('/order/detail/1')->with('success', ['message' => 'Pesanan Telah Selesai!']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::find($id);
        $order->delete();

        return redirect('/order/detail/1')->with('success', ['message' => 'Data berhasil Dihapus!']);
        
    }

    private function getSize($size1, $size2)
    {
        if($size2 == null){
            $size   = $size1;
        }else{
            $size   = $size1."x".$size2;
        }
        return $size;
    }

    private function getAmount($amount, $unit)
    {
        if($unit == "0"){
            $amount = $amount * 12;
        }
        return $amount;
    }
}
