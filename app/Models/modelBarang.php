<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class modelBarang extends Model
{
    use HasFactory;
    public $primaryKey = 'id_brg';
    //untuk mendeskripsikan field yang dapat dimanipulasi
    protected $fillable = [
        'nama_kerajinan', 'bahan', 'variasi_ukuran', 'keterangan', 'id_peng', 'id_brg', 'harga', 'gambar',
    ];
    public function pengrajin()
    {
        return $this->belongsTo(modelPengrajin::class, 'id_peng', 'id_peng');
    }
    static function getPengrajin()
    {
        $return = DB::table('model_barangs')
            ->join('model_pengrajins', 'model_barangs.id_peng', '=', 'model_pengrajins.id_peng');
        return $return;
    }
}
