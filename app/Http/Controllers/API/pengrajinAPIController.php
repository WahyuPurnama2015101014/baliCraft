<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\modelPengrajin;
use Illuminate\Http\Request;

class pengrajinAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $pengrajin = modelPengrajin::paginate(10);
        return response()->json($pengrajin);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //create
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
        $pengrajin = modelPengrajin::find($id);
        return response()->json($pengrajin);
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
            $peng = modelPengrajin::find($id);
            $peng->delete();
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
