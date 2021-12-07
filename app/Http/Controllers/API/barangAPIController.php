<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
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
        $res['barang'] = modelBarang::getPengrajin();
        //search
        if (isset($_GET['s']) && $_GET['s'] != null && $_GET['s'] != " ") {
            $s = $_GET['s'];
            $res['barang'] = $res['barang']
                ->where('nama_kerajinan', 'like', "%$s%");
        }
        //filter dengan nama
        if (isset($_GET['peng']) && $_GET['peng'] != '') {
            $res['barang'] = $res['barang']->where('nama_peng', $_GET['peng']);
        }
        $res['barang'] = $res['barang']->paginate(5);
        $res['pengrajin'] = modelPengrajin::all();
        return response()->json($res);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pengrajin = modelPengrajin::all();
        return response()->json($pengrajin);
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
            'gambar' => 'required'
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
        $res['pengrajin'] = modelPengrajin::all();
        $res['barang'] = modelBarang::find($id);
        return response()->json($res);
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
