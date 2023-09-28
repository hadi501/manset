<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Employe;

class EmployeController extends Controller
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
        $employes = Employe::All();

        return view('data.employe',['employes' => $employes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $employe = Employe::updateOrCreate(
            ['name' => $request->name, 'task' => $request->task],
            ['phone' => $request->phone]
        );

        return redirect('/employe/create')->with('success', ['message' => 'Karyawan Berhasil Didaftarkan!']);
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
        $employe = Employe::Find($id);
        $employe->name  = $request->name;
        $employe->task  = $request->task;
        $employe->phone = $request->phone;
        $employe->save();

        return redirect('/employe/create')->with('success', ['message' => 'Karyawan Berhasil Diedit!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employe = Employe::find($id);
        $employe->delete();

        return redirect('/employe/create')->with('success', ['message' => 'Data berhasil Dihapus!']);
    }
}
