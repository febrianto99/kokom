<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Session;
use App\jenistas;
use DataTables;

class JenistasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenistas = Jenistas::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.jenistas.index', compact('jenistas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jenistas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jenistas = new jenistas;
            $jenistas->jenis_tas = ($request->jenis_tas);
            $jenistas->slug = Str::slug($request->jenis_tas, '-');
            $jenistas->save();
            Session::flash("flash_notification", [
                "level" => "success",
                "message" => "berhasil mengedit <b>"
                    . $jenistas->jenis_tas . "</b>"
            ]);
                //6.tampilkan berhasil
            return redirect()->route('jenistas.index')->with('success', 'Berhasil ditambah');;
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
        $jenistas = Jenistas::find($id);
        return view('jenistas.edit', compact('jenistas'));
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
    $this->validate($request, [
        'name' => 'required|string|max:50|unique:categories,name,' . $id
    ]);

    $jenistas = Jenistas::find($id);
    $jenistas->update([
        'name' => $request->name,
        'parent_id' => $request->parent_id
    ]);

    return redirect(route('jenistas.index'))->with(['success' => 'jenistas Diperbaharui!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $jenistas = Jenistas::withCount(['child'])->find($id);
    if ($jenistas->child_count == 0) {
        $jenistas->delete();
        return redirect(route('jenistas.index'))->with(['success' => 'jenistas Dihapus!']);
    }
    return redirect(route('jenistas.index'))->with(['error' => 'jenistas Ini Memiliki Anak jenistas!']);
    }
}
