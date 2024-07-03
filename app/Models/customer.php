<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;
    protected $table = "customers";
    protected $fillable = [
        'customer_id',
        'nama',
        'alamat',
        'type', 
        'jenjang',
        'tingkatan',
        'kelas',
        'saldo',
        'kota',
        'kode_pos',
        'negara',
        'kontak',
        'telephone',
    ];
}
