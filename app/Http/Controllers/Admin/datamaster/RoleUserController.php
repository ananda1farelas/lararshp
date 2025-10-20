<?php

namespace App\Http\Controllers\Admin\DataMaster;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RoleUserController extends Controller
{
    public function index()
    {
        $roleUsers = DB::table('role_user')
            ->join('user', 'role_user.iduser', '=', 'user.iduser')
            ->join('role', 'role_user.idrole', '=', 'role.idrole')
            ->select('role_user.*', 'user.nama as user_name', 'role.nama_role as role_name')
            ->get();

        return view('admin.datamaster.role_user.index', compact('roleUsers'));
    }
}


