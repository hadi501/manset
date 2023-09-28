<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\Production;
use App\Models\Finishing;
use App\Models\Sock;
use App\Models\Color;

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
        $socks = Sock::All();
        $colors = Color::All();
        $customers = Order::select('customer')->where('status', '0')->groupBy('customer')->get();

        return view('order.input',['socks' => $socks, 'colors' => $colors, 'customers' => $customers]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);

        $size   = app(Controller::class)->getSize($request->size1, $request->size2);
        $amount = app(Controller::class)->getAmount($request->amount, $request->unit);
        
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
                'status'    => '0'
            ]);
        }

        Alert::success('Success!', 'Data Telah diinput');
        return redirect('/order/create');
        
    }


    /**
     * Show the detail for the orders.
     */
    public function detail()
    {
        $orders    = Order::with(['production', 'finishing'])->get();
        $customers = Order::select([DB::raw("customer as customer"), DB::raw("SUM(amount) as amount")])->where('status', '0')->groupBy('customer')->get();

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
        $socks = Sock::All();
        $colors = Color::All();

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

        return view('order.edit',['order' => $order, 'socks' => $socks, 'colors' => $colors]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $size   = app(Controller::class)->getSize($request->size1, $request->size2);
        $amount = app(Controller::class)->getAmount($request->amount, $request->unit);

        $order            = Order::find($request->id);
        $order->customer  = $request->customer;
        $order->sock      = $request->sock;
        $order->color     = $request->color;
        $order->size      = $size;
        $order->amount    = $amount;
        $order->price     = $request->price;
        $order->deadline  = $request->deadline;
            
        $order->save();

        Alert::success('Updated!', 'Data Telah diupdate');
        return redirect('/order/detail/1');
    }

    /**
     * Show the history for the orders.
     */
    public function history()
    {
        $orders    = Order::with(['production', 'finishing'])->get();
        $customers = Order::select([DB::raw("customer as customer"), DB::raw("SUM(amount) as amount")])->where('status', '1')->groupBy('customer')->get();

        return view('order.history',['orders' => $orders, 'customers' => $customers]);
    }

    public function finishOrder(Request $request){
        
        $order = Order::find($request->id);

        $order->status = '1';
        $order->save();

        $order->production()->update(['status' => '1']);
        $order->finishing()->update(['status' => '1']);

        Alert::success('Done!', 'Pesanan telah selesai');
        return redirect('/order/detail/1');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::find($id);

        $order->production()->delete();
        $order->finishing()->delete();
        $order->delete();

        Alert::success('Deleted!', 'Data Telah dihapus');
        return redirect('/order/detail/1');
        
    }
}
