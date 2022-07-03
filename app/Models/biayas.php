<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class biayas extends Model
{
    use HasFactory;

    public function pembayarans(){
        return $this->hasOne(pembayarans::class);
    }

    public function pemakaians(){
        return $this->belongsTo(pemakaians::class, 'pemakaian_id');
    }
}
