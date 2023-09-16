<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Sock;

class SockController extends Controller
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
        $socks = Sock::All();

        return view('data.sock', ['socks' => $socks]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sock = Sock::updateOrCreate(
            ['sock' => $request->sock, 'dimension' => $request->dimension]
        );

        return redirect('/sock/create')->with('success', ['message' => 'Kaos Kaki Berhasil Ditambahkan!']);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sock = Sock::Find($id);
        $sock->sock      = $request->sock;
        $sock->dimension = $request->dimension;
        $sock->save();

        return redirect('/sock/create')->with('success', ['message' => 'Kaos Kaki Berhasil Diedit!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sock = Sock::find($id);
        $sock->delete();

        return redirect('/sock/create')->with('success', ['message' => 'Data berhasil Dihapus!']);
    }
}
