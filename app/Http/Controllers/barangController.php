<?php

namespace App\Http\Controllers;

use App\Models\modelBarang;
use App\Models\modelPengrajin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class barangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Daftar Barang";
        $barang = modelBarang::getPengrajin();
        //search
        if (isset($_GET['s']) && $_GET['s'] != null && $_GET['s'] != " ") {
            $s = $_GET['s'];
            $barang = $barang
                ->where('nama_kerajinan', 'like', "%$s%");
        }
        //filter
        if (isset($_GET['peng']) && $_GET['peng'] != '') {
            $barang = $barang->where('nama_peng', $_GET['peng']);
        }
        $barang = $barang->paginate(5);
        $pengrajin = modelPengrajin::all();
        return view('admin.barang-tabel', compact('title', 'barang', 'pengrajin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Create Barang";
        $pengrajin = modelPengrajin::all();
        return view('admin.barang-create', compact('title', 'pengrajin'));
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
            'file' => 'Perhatikan format dan ukuran file'
        ];
        //untuk menyimpan data
        $validasi = $request->validate([
            'id_brg' => '',
            'nama_kerajinan' => 'required',
            'bahan' => 'required',
            'harga' => 'required',
            'keterangan' => '',
            'id_peng' => 'required',
            'gambar' => 'required|mimes:png,jpg|max:1024'
        ], $messages);
        try {
            $fileName = time() . $request->file('gambar')->getClientOriginalName();
            $path = $request->file('gambar')->storeAs('gambar-barang', $fileName);
            $validasi['gambar'] = $path;
            $response = modelBarang::create($validasi);
            return redirect('brg');
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
        $title = "Create Barang ";
        $pengrajin = modelPengrajin::all();
        $barang = modelBarang::find($id);
        if ($barang != NULL) {
            $title = "Edit Data " . $barang->nama_kerajinan;
            return view('admin.barang-create', compact('title', 'pengrajin', 'barang'));
        } else {
            return view('admin.barang-create', compact('title', 'pengrajin'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // }
    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            'id_brg' => '',
            'nama_kerajinan' => 'required',
            'bahan' => 'required',
            'harga' => 'required',
            'keterangan' => '',
            'id_peng' => 'required',
            'gambar' => ''
        ]);
        try {
            if ($request->file('gambar')) {
                $fileName = time() . $request->file('gambar')->getClientOriginalName();
                $path = $request->file('gambar')->storeAs('gambar-barang', $fileName);
                $validasi['gambar'] = $path;
            }
            $response = modelBarang::find($id);
            $response->update($validasi);
            return redirect('brg');
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
            $barang = modelBarang::find($id);
            $barang->delete();
            return redirect('brg');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
