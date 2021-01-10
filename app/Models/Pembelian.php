<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pembelian extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'pembelian';
    protected $primaryKey = 'kode_beli';

    protected $fillable = [
        'kode_beli','nama','jumlah','supplier'
    ];

    protected $hidden = [

    ];

    public function nama_thing(){
        return $this->belongsTo(NamaThing::class,'kode_beli','id');
    }

    
    public function data_thing(){
        return $this->belongsTo(DataThing::class,'kode_beli','data_id');
    }
}
