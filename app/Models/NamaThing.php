<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NamaThing extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'nama'
    ];

    protected $hidden = [

    ];

    public function data_thing(){
        return $this->hasMany(DataThing::class,'data_id','id');
    }
    public function penjualan_detail(){
        return $this->hasMany(PenjualanDetail::class,'id','id');
    }
    public function pembelian(){
        return $this->hasMany(Pembelian::class,'kode_beli','id');
    }
}
