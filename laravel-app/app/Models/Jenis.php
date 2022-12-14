<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    use HasFactory;
    protected $table = 'jenis';
    protected $fillable =[
        'nama_jenis','gambar'
    ];

    public function barang(){
        return $this->hasOne(Barang::class, 'jenis_id', 'id');
    }
    public function katalog(){
        return $this->hasMany(Katalog::class, 'jenis_id', 'id');
    }
}
