<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use App\bahantas;
use DataTables;

class BahantasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bahantas = Bahantas::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.bahantas.index', compact('bahantas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bahantas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  $request->validate([
            //     'bahantas_kode' => 'required|unique:bahantas',
            //     'bahantas_nama' => 'required'
            // ]);
            $bahantas = new bahantas;
            $bahantas->bahan_tas = ($request->bahan_tas);
            $bahantas->save();
            Session::flash("flash_notification", [
                "level" => "success",
                "message" => "berhasil mengedit <b>"
                    . $bahantas->bahan_tas . "</b>"
            ]);
                //6.tampilkan berhasil
            return redirect()->route('bahantas.index')->with('success', 'Berhasil ditambah');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
