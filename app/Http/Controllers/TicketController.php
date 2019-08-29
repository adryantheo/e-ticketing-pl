<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    
    public function index()
    {
        return response()->json(Ticket::all(), 200);
    }

    
    public function store(Request $request)
    {
        $ticket = Ticket::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'price' => $request->input('price'),
            'qr_code' => $request->input('qr_code'),
            'is_vip' => $request->input('is_vip'),
            'product_id' => $request->input('product_id'),
        ]);

        return response()->json($ticket, 201);
    }

    
    public function show(Ticket $ticket)
    {
        return response()->json($ticket, 200);
    }

    
    public function update(Request $request, Ticket $ticket)
    {
        $status = $ticket->update(
            $request->only([
                'name',
                'email',
                'price',
            ])
        );

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Harga Tiket Diupdate' : 'Gagal Mengganti harga Tiket'
        ],200);
    }

    public function isCheckin(Ticket $ticket){
        if($ticket->is_checkin != true){
             $ticket -> is_checkin = true;
             $status = $ticket->save();
             return response()->json([
            'status' => $status,
            'message' => $status ? 'Status Updated!' : 'Error Updating Status'
        ]);
        }
        return response()->json([          
            'message' => 'Udah Login BGSD!!!!' 
        ]);
       
    }

    public function destroy(Ticket $ticket)
    {
        $status = $ticket -> delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? "Berhasil Menghapus Ticket" : "Gagal Menghapus Ticket"
        ]);
    }
}
