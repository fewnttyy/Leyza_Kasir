<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';
    protected $primaryKey = 'id_barang'; 

    protected $fillable = [
        'user_id',
        'foto',
        'nama_barang',
        'harga_modal',
        'harga_jual',
        'stok',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
