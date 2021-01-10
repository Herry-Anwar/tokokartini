<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PenjualanDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'penjualandetail';

    protected $fillable =[
        'penjualan_id','nama','jumlah','harga_jual','keterangan'
    ];

    public function nama_thing(){
        return $this->belongsTo(NamaThing::class,'id','id');
    }
}
