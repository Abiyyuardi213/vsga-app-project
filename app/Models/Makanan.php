<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Makanan extends Model
{
    use HasFactory;

    protected $table = 'makanan';

    protected $primaryKey = 'id_makanan';

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_makanan',
        'nama_makanan',
        'kategori',
        'harga',
        'stok',
        'id_restoran',
    ];

    public function restoran()
    {
        return $this->belongsTo(Restoran::class, 'id_restoran', 'id_restoran');
    }
}
