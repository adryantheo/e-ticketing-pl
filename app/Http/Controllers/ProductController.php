<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
   
    public function index()
    {
        return response()->json(Product::with('tickets')->get(), 200);
    }

    
    public function store(Request $request)
    {
        $product = Product::create([
            'event_name' => $request->input('event_name'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'place' => $request->input('place'),
            'organizer_name'=> $request->input('organizer_name'),
            'stock' => $request->input('stock'),
        ]);

        return response()->json($product, 201);
    }

    public function show($product)
    {
        return response()->json(Product::with('tickets')->where('id', $product)->get(), 200);
    }

   
    public function update(Request $request, Product $product)
    {
        $status = $product->update(
            $request->only([
                'event_name',
                'date',
                'time',
                'place',
                'organizer_name',
                'stock'
            ])
        );
        return response()->json([
            'status' => $status,
            'message' => $status ? 'Event Berhasil Diupdate' : 'Gagal Mengupdate Event'
        ],200);
    }

    public function destroy(Product $product)
    {
        $status = DB::transaction(function () use ($product)
        {
            $product->tickets()->delete();
            $product->delete();
        },3);
         
        return response()->json([
            'status' => (bool)$product,
            'message' => $product ? "Berhasil Menghapus Event" : "Gagal Menghapus Event"
        ]);
    }
}
