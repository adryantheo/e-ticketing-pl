<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(User::all(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
            ]);
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $request->role_id, 
        ]);
        $user->save();
        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }

    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ];
        $status = 401;
        $response = ['error' => 'Unauthorised'];
        if (Auth::attempt($credentials)) {
            $status = 200;
            $response = [
                'token' => Auth::user()->createToken('TicketPL')->accessToken,
                'user' => Auth::user()
            ];
        }
        return response()->json($response, $status);
    }

    // public function logout(Request $request)
    // {
    //     $request->user()->token()->revoke();
    //     return response()->json([
    //         'message' => 'Successfully logged out'
    //     ]);
    // }
   
    public function show(User $user)
    {
        return response()->json($user,200);
    }

 
    public function update(Request $request, User $user)
    {
        $status = User::find($user);
        $status->name= $request['name'];
        $status->email= $request['email'];
        $status->update();
        return response()->json([
            'status' => $status,
            'message' => $status ? 'User Diupdate!' : 'Error Mengupdate User'
        ]);
    }

    public function destroy(User $user)
    {
        $status = $user -> delete();
        return response()->json([
            'status' => $status,
            'message' => $status ? "Berhasil Menghapus User" : "Gagal Menghapus User"
        ]);
    }
}
