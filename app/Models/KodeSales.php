<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KodeSales extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $fillable=[
        'kode_sales'
    ];
}
