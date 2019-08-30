<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
   
    public function index()
    {
        return response()->json(Role::all(), 200);
    }

   
    public function store(Request $request)
    {
        $role = Role::create([
            'role_name' => $request->input('role_name'),
        ]);

        return response()->json($role, 201);
    }

   
    public function show(Role $role)
    {
        return response()->json($role,200);
    }

 
    public function update(Request $request, Role $role)
    {
        $status = $role->update(
            $request->only([
                'role_name',
            ])
        );

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Nama Role Berhasil Diupdate' : 'Gagal Mengganti Nama Role'
        ],200);
    }

    public function destroy(Role $role)
    {
        $status = $role -> delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? "Berhasil Menghapus Role" : "Gagal Menghapus Role"
        ]);
    }
}
