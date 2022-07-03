<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembayarans extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function biayas(){
        return $this->belongsToMany(biayas::class, 'biaya_id');
    }
    public function pelanggans(){
        return $this->belongsToMany(pelanggans::class, 'pelanggan_id');
    }
}
