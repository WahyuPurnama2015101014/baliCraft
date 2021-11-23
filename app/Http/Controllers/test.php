<?php

namespace App\Http\Controllers;

use App\Models\modelBarang;

function edit()
{
    //menampilkan data edit
    $barang = modelBarang::all();
    $s = "a";
    $barang = $barang->where('nama_kerajinan',  "$s");
    // $barang = modelBarang::find($id);

    $x = "jumlah = " . $barang;
    echo $x;
}
edit();
