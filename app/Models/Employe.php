<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employe extends Model
{
    use HasFactory;

    protected $table = 'employes';

    public $incrementing = false;

    protected $keyType = 'int';

    protected $fillable = [
        'id',
        'nama',
        'alamat',
        'gender',
        'gaji',
    ];
}
