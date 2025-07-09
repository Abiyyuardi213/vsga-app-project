<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Restoran extends Model
{
    use HasFactory;

    protected $table = 'restoran';
    protected $primaryKey = 'id_restoran';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_restoran',
        'nama_restoran',
        'alamat',
        'kota',
        'telepon',
    ];

    public function makanans()
    {
        return $this->hasMany(Makanan::class, 'id_restoran', 'id_restoran');
    }
}
