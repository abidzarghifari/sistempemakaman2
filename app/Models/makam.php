<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class makam extends Model
{
    //
    protected $fillable = [
        'Nama',
        'Gelar',
        'Tgl_Lahir',
        'Tgl_Meninggal',
        'Cluster',
        'Deskripsi',
        'media_path',
    ];

}
