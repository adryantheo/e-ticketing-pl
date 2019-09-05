<?php

namespace App\Http\Controllers;

use App\QRCode;
use Illuminate\Http\Request;

class QRCodeController extends Controller
{
  
    public function index()
    {
        return response()->json(QRCode::all(), 200);
    }

    public function store(Request $request)
    {
        $qRCode = QRCode::create([
            'qr_code' => $request->input('qr_code'),
            'ticket_id' => $request->input('ticket_id'),
        ]);

        return response()->json($qRCode, 201);
    }

    public function show(QRCode $qRCode)
    {
        return response()->json($qRCode, 200);
    }


    public function update(Request $request, QRCode $qRCode)
    {
        $status = $qRCode->update(
            $request->only([
                'qr_code',
                'ticket_id',
            ])
        );

        return response()->json([
            'status' => $status,
            'message' => $status ? 'QR Tiket Diupdate' : 'Gagal Mengganti QR Tiket'
        ],200);
    }

    public function destroy(QRCode $qRCode)
    {
        $status = $qRCode -> delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? "Berhasil Menghapus QR Tiket" : "Gagal Menghapus QR Tiket"
        ]);
    }
}
