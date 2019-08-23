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
            'harga' => $request->input('harga')
        ]);

        return response()->json($ticket, 201);
    }

    
    public function show(Ticket $ticket)
    {
        return response()->json($ticket, 200);
    }

    
    public function update(Request $request, Ticket $ticket)
    {
        $status = Ticket::find($ticket);
        $status->harga = $request['harga'];
        $status->update();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Harga Tiket Diupdate' : 'Gagal Mengganti harga Tiket'
        ],200);
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
