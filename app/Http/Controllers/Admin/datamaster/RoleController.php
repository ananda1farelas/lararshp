<?php

namespace App\Http\Controllers\Admin\DataMaster;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index()
    {
        $roles = DB::table('role')->get();
        return view('admin.datamaster.role.index', compact('roles'));
    }
}
