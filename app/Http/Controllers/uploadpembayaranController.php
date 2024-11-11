<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\upload;

class uploadpembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('upload');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required',
            'bukti_pembayaran' => 'required|file|mimes:pdf,jpg,jpeg,png|max:10240',
        ]);

        // Check if NISN exists in pendaftarans table
        $pendaftaran = Pendaftaran::where('nisn', $request->nisn)->first();

        if (!$pendaftaran) {
            return redirect()->back()
                ->with('error', 'Upload gagal. NISN tidak terdaftar.')
                ->withInput();
        }

        try {
            $file = $request->file('bukti_pembayaran');
            $path = $file->store('bukti_pembayaran', 'public');

            Upload::create([
                'nisn' => $request->nisn,
                'bukti_pembayaran' => $path,
            ]);

            return redirect()->back()->with('success', 'Bukti pembayaran berhasil diupload.');
        } catch (\Exception $e) {
            // Log the error if needed
            \Log::error('Upload error: ' . $e->getMessage());

            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat mengupload. Silakan coba lagi.')
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
