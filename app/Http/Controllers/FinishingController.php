<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
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
        return view('finishing.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $orders     = Order::where('status', '0')->get();
        $customers  = Order::select([DB::raw("customer as customer"), DB::raw("SUM(amount) as amount")])->where('status', '0')->groupBy('customer')->get();
        $employes   = Employe::where('task', '2')->orWhere('task', '3')->get();

        return view('finishing.input', ['orders' => $orders, 'customers' => $customers, 'employes' => $employes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $amount = app(Controller::class)->getAmount($request->amount, $request->unit);
        $task    = Employe::select('task')->where('id', $request->employe_id)->get();
        
        // $date = Carbon::now()->format('Y-m-d');

        $finishing = Finishing::updateOrCreate(
            ['order_id' => $request->order_id, 'employe_id' => $request->employe_id, 'task' => $task[0]->task, 'date' => $request->date],
            ['amount' => $amount, 'status' => '0']
        );

        Alert::success('Success!', 'Data Telah diinput');
        return redirect('/finishing/create');

    }

    public function detail()
    {
        $finishing = Finishing::with(['order','employe'])->where('status', '0')->orderBy('id', 'desc')->get();

        return view('finishing.detail', ['finishing' => $finishing]);
    }

    public function history()
    {
        $finishing = Finishing::with(['order','employe'])->where('status', '1')->orderBy('id', 'desc')->get();

        return view('finishing.history', ['finishing' => $finishing]);
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
        $finishing = Finishing::with(['order','employe'])->find($id);

        // cek jika pesanan dalam jumlah lusin
        $a = $finishing->amount/12;

        if (!is_float($a)) {
            $finishing->amount = $a;
            $finishing->unit = 0; // 0 = Lusin
        } else {
            $finishing->unit = 1; // 1 = Pasang
        }

        return view('finishing.edit', ['finishing' => $finishing]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $amount = app(Controller::class)->getAmount($request->amount, $request->unit);
        
        $finishing = Finishing::find($request->id);
        $finishing->amount = $amount;

        $finishing->save();

        Alert::success('Updated!', 'Data Telah diupdate');
        return redirect()->action([FinishingController::class, 'detail']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
     
        $finishing = Finishing::find($id);
        $finishing->delete();

        Alert::success('Deleted!', 'Data Telah dihapus');
        return redirect()->action([FinishingController::class, 'index']);

    }
}
