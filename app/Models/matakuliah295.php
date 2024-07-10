<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class matakuliah295 extends Model
{
    use HasFactory;
    protected $table = 'tb_matakuliah295';

    protected $fillable = [
        'Kode_MK',
        'Nama_MK',
        'SKS',
        'Jurusan',
        'Deskripsi',
        'Silabus_File'
    ];
}
