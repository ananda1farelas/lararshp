<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $primaryKey = 'idkategori';
    public $timestamps = false;
    protected $fillable = ['nama_kategori'];

    public function kodeTindakan()
    {
        return $this->hasMany(KodeTindakanTerapi::class, 'idkategori', 'idkategori');
    }
}
