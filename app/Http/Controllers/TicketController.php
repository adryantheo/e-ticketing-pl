<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\QRCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    
    public function index()
    {
        return response()->json(Ticket::with('qr_codes')->get(), 200);
    }

    
    public function store(Request $request)
    {
        $ticket = null;
        DB::transaction(function () use ($request, &$ticket){
            $ticket = Ticket::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'price' => $request->input('price'),
                'quantity' => $request->input('quantity'),
                'is_vip' => $request->input('is_vip'),
                'is_ortu' => $request->input('is_ortu'), 
                'product_id' => $request->input('product_id'),
            ]);

            //Generate QR
            $qrcode = QRCode::create([
                'qr_code' => $ticket->id . "_" . $ticket->name . "_" . $ticket->quantity . "_" . $ticket->is_vip,
                'ticket_id' => $ticket->id
            ]);
        },3);
        

        return response()->json($ticket, 201);
    }

    
    public function show($email)
    {
        $status = Ticket::where('email', "LIKE", $email)->with('qr_codes')->first();
        
        return response()->json($status, 200);
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

    public function redeem(Request $request, $qrcode)
    {
        $status = QRCode::where('qr_code', "LIKE", $qrcode)->first();
        if(!$status){
                return response()->json('Invalid Ticket');
            }
        else if($status->is_checkin != true){
                $data = QRCode::where('qr_code', "LIKE", $qrcode)
                        ->update(['is_checkin' => true ]);
                $datauser = QRCode::where('qr_code', "LIKE", $qrcode)->with(['tickets'])->first();
                return response()->json([
                        'message' => $data ? 'Check-In Success!' : 'Error Check-In',
                        'userdata' => $datauser
                    ]);
                }
        else{
                return response()->json(['Ticket Already Redeemed']);
            }
    }

    public function paid(Ticket $ticket)
    {
        $ticket->is_paid = true;
        $status = $ticket->save();

        return response()->json([
            'Status' => $status,
            'Message' => $status ? 'Status Pembayaran Berhasil di Ganti' : 'Gagal Mengganti Status Pembayaran'
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
