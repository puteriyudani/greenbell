<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategoris';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama',
        'menu',
        'kode_awal',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'kategori');
    }
}
