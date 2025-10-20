<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory;

    protected $table = 'user';
    protected $primaryKey = 'iduser';
    public $timestamps = false;

    protected $fillable = ['nama', 'email', 'password'];

    public function roleUser()
    {
        return $this->hasMany(RoleUser::class, 'iduser');
    }

    public function pemilik()
    {
        return $this->hasOne(Pemilik::class, 'iduser');
    }
}
