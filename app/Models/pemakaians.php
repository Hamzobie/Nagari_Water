<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemakaians extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function biayas(){
        return $this->hasTo(biayas::class);
    }
}
