<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    
    public function index()
    {
        return response()->json(Type::with('tickets')->get(), 200);
    }

    
    public function store(Request $request)
    {
        $type = Type::create([
            'type' => $request->input('type'),
            'date' => $request->input('date'),
            'product_id' => $request->input('product_id')
        ]);

        return response()->json($type, 201);
    }

    
    public function show($type)
    {
        return response()->json(Type::with('tickets')->where('id', $type)->get(), 200);
    }

    public function update(Request $request, Type $type)
    {
        $status = $type->update(
            $request->only([
                'type',
                'date',
            ])
        );
        return response()->json([
            'status' => $status,
            'message' => $status ? 'Jenis Tiket Berhasil Diupdate' : 'Gagal Mengupdate Jenis Tiket'
        ],200);
    }

    
    public function destroy(Type $type)
    {
        $status = DB::transaction(function () use ($type)
        {
            $type->tickets()->delete();
            $type->delete();
        },3);
         
        return response()->json([
            'status' => (bool)$type,
            'message' => $type ? "Berhasil Menghapus Jenis Tiket" : "Gagal Menghapus Jenis Tiket"
        ]);
    }
}
