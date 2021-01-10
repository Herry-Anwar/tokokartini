<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataThing extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'data_id';

    protected $fillable = [
        'data_id','nama','harga','hargajual','stok','satuan','supplier'
    ];

    protected $hidden = [

    ];

    public function nama_thing(){
        return $this->belongsTo(NamaThing::class,'data_id','id');
    }
    public function pembelian(){
        return $this->hasMany(Pembelian::class,'kode_beli','data_id');
    }
}
