<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nilai296 extends Model
{
    use HasFactory;
    protected $table = 'tb_nilai296';

    protected $fillable = [
        'NIM',
        'Semester',
        'Tahun_Ajaran',
        'Bukti_Nilai_File'
    ];
}
