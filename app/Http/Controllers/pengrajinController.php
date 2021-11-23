<?php

namespace App\Http\Controllers;

use App\Models\modelPengrajin;
use Illuminate\Http\Request;

class pengrajinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $title = "Daftar Pengrajin";
        $pengrajin = modelPengrajin::paginate(10);
        return view('admin.pengrajin-tabel', compact('title', 'pengrajin'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $title = "Tambah Data Pengrajin";
        return view('admin.pengrajin-create', compact('title'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //set pesan kesalahan
        $messages = [
            'required' => 'Kolom : attribute harus lengkap',
            'numeric' => 'Kolom : attribute Harus Angka.',
        ];
        //untuk menyimpan data
        $validasi = $request->validate([
            'id_peng' => '',
            'nama_peng' => 'required',
            'alamat' => 'required',
            'email' => 'required',
        ], $messages);
        try {
            $response = modelPengrajin::create($validasi);
            return redirect('peng');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
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
        //menampilkan data edit
        $title = "Tambah Data Pengrajin";
        $pengrajin = modelPengrajin::find($id);
        if ($pengrajin != NULL) {
            $title = "Edit Data " . $pengrajin->nama_peng;
            return view('admin.pengrajin-create', compact('title', 'pengrajin'));
        } else {
            return view('admin.pengrajin-create', compact('title',));
        }
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
        $validasi = $request->validate([
            'id_peng' => '',
            'nama_peng' => 'required',
            'alamat' => 'required',
            'email' => 'required',
        ]);
        try {
            $response = modelPengrajin::find($id);
            $response->update($validasi);
            return redirect('peng');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $peng = modelPengrajin::find($id);
            $peng->delete();
            return redirect('peng');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
