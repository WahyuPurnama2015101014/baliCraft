<?php

namespace App\Http\Controllers;

use App\Models\modelBarang;
use App\Models\modelPengrajin;
use Illuminate\Http\Request;

class barangAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$title = "Daftar Barang";
        //$barang = new modelBarang;
        //$barang = modelBarang::getPengrajin()->paginate(3);
        $barang = modelBarang::getPengrajin()->get();
        // $key = "Bross";
        //$barang->where('nama_kerajinan', 'like', '%b%')->dd();
        //search
        // if (isset($_GET['s']) && $_GET['s'] != null && $_GET['s'] != " ") {
        //     $s = $_GET['s'];
        //     //melakukan query like berdasarkan param nama
        //     // error , tidak menampilkan hasil search
        //     //$barang = $barang->where('nama_kerajinan', 'like', "%$s%");
        //     $barang = $barang->where('nama_kerajinan',  $s);
        // }
        // //filter
        // if (isset($_GET['id_peng']) && $_GET['id_peng'] != '') {
        //     $barang = $barang->where('id_peng', $_GET['id_peng']);
        // }
        //$pengrajin = modelPengrajin::all();
        //return view('admin.barang-tabel', compact('title', 'barang', 'pengrajin'));
        return response()->json($barang);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $title = "Create Barang";
        // $pengrajin = modelPengrajin::all();
        // return view('admin.barang-create', compact('title', 'pengrajin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'id_brg' => '',
            'nama_kerajinan' => 'required',
            'bahan' => 'required',
            'harga' => 'required',
            'keterangan' => '',
            'id_peng' => 'required',
            'gambar' => 'required|mimes:png,jpg|max:1024'
        ]);
        try {
            $fileName = time() . $request->file('gambar')->getClientOriginalName();
            $path = $request->file('gambar')->storeAs('gambar-barang', $fileName);
            $validasi['gambar'] = $path;
            $response = modelBarang::create($validasi);
            return response()->json([
                'success' => true,
                'message' => 'success',
                'data' => $response,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Err',
                'errors' => $e->getMessage(),
            ]);
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
        // $title = "Create Barang ";
        // $pengrajin = modelPengrajin::all();
        // $barang = modelBarang::find($id);
        // if ($barang != NULL) {
        //     $title = "Edit Data " . $barang->nama_kerajinan;
        //     return view('admin.barang-create', compact('title', 'pengrajin', 'barang'));
        // } else {
        //     return view('admin.barang-create', compact('title', 'pengrajin'));
        // }
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
            return response()->json([
                'success' => true,
                'message' => 'success',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Err',
                'errors' => $e->getMessage(),
            ]);
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
            return response()->json([
                'success' => true,
                'message' => 'success',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Err',
                'errors' => $e->getMessage(),
            ]);
        }
    }
}
