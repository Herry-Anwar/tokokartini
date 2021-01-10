<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sales extends Model
{
    use HasFactory;
    use SoftDeletes;
 
    protected $primaryKey = 'id_penjualan';

    protected $fillable = [
        'id_penjualan','nama','jumlah','keterangan'
    ];

    protected $hidden = [

    ];

    public function nama_thing(){
        return $this->belongsTo(NamaThing::class,'id_penjualan','id');
    }
}
