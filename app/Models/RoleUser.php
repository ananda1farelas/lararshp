<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Role;
use App\Models\TemuDokter;
use App\Models\RekamMedis;

class RoleUser extends Model
{
    use HasFactory;

    protected $table = 'role_user';
    protected $primaryKey = 'idrole_user';
    public $timestamps = false;
    protected $fillable = [
        'iduser',
        'idrole',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'iduser', 'iduser');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'idrole', 'idrole');
    }

    public function temuDokters()
    {
        return $this->hasMany(TemuDokter::class, 'idrole_user', 'idrole_user');
    }

    public function rekamMedis()
    {
        return $this->hasMany(RekamMedis::class, 'dokter_pemeriksa', 'idrole_user');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'iduser', 'iduser');
    }

}
