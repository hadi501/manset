<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Color;

class ColorController extends Controller
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
        $colors = Color::All();

        return view('data.color', ['colors' => $colors]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $color = Color::updateOrCreate(
            ['color' => $request->color]
        );

        return redirect('/color/create')->with('success', ['message' => 'Warna Berhasil Ditambahkan!']);
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
        $color        = Color::Find($id);
        $color->color = $request->color;
        $color->save();

        return redirect('/color/create')->with('success', ['message' => 'Warna Berhasil Diedit!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $color = Color::find($id);
        $color->delete();

        return redirect('/color/create')->with('success', ['message' => 'Data berhasil Dihapus!']);
    }
}
