<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';

    protected $fillable = [
        'user_id',
        'total_harga',
        'uang_dibayar',
        'kembalian',
    ];

    public function details()
    {
        return $this->hasMany(DetailTransaksi::class, 'id_transaksi');
    }
}

