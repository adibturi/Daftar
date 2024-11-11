<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use Midtrans\Config;
use App\Models\upload;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{

    public function store(Request $request)
    {
        // Validasi data yang diinput
        $request->validate([
            'nama_lengkap' => 'required|string|max:100',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'nisn' => 'required|string|max:10|unique:pendaftaran,nisn',
            'nomor_telepon' => 'required|string|max:15',
            'kartu_keluarga' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10240',
            'akta_kelahiran' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10240',
            'foto_siswa' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10240',
            'raport' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10240',
            'kartu_bantuan_sosial' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10240',
    ]);


        // Handle file upload
        $data = $request->all();

        if ($request->hasFile('kartu_keluarga')) {
            $data['kartu_keluarga'] = $request->file('kartu_keluarga')->store('uploads', 'public');
        }
        if ($request->hasFile('akta_kelahiran')) {
            $data['akta_kelahiran'] = $request->file('akta_kelahiran')->store('uploads', 'public');
        }
        if ($request->hasFile('foto_siswa')) {
            $data['foto_siswa'] = $request->file('foto_siswa')->store('uploads', 'public');
        }
        if ($request->hasFile('raport')) {
            $data['raport'] = $request->file('raport')->store('uploads', 'public');
        }
        if ($request->hasFile('kartu_bantuan_sosial')) {
            $data['kartu_bantuan_sosial'] = $request->file('kartu_bantuan_sosial')->store('uploads', 'public');
        }

        // Simpan data ke database
        $pendaftaran = Pendaftaran::create($data);


        // Set Midtrans configuration
        Config::$serverKey = 'SB-Mid-server-eToNXtqVL44uwLu-4BMV9hJn';
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // Prepare Midtrans parameters
        $params = [
            'transaction_details' => [
                'order_id' => 'ORDER-' . $pendaftaran->nisn . '-' . time(),
                'gross_amount' => 700000,
            ],
            'customer_details' => [
                'first_name' => $pendaftaran->nama_lengkap,
                'last_name' => '',
                'nisn' => $pendaftaran->nisn,
                'email' => $request->email ?? 'noemail@example.com',
                'phone' => $pendaftaran->nomor_telepon,
            ],
        ];

        try {
            // Get Snap Token
            $snapToken = Snap::getSnapToken($params);

            // Prepare response data
            return response()->json([
                'success' => true,
                'message' => 'Pendaftaran berhasil disimpan',
                'data' => [
                    'pendaftaran_id' => $pendaftaran->id,
                    'snap_token' => $snapToken
                ]
            ]);

            // Return JSON response
            return response()->json($responseData, 200);
        } catch (\Exception $e) {
            // Handle Midtrans error
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat memproses pembayaran',
                'error' => $e->getMessage(),
            ], 500);
        }
        }


    public function index()
    {
        $pendaftarans = Pendaftaran::all(); // Ambil semua data pendaftaran
        return view('tampilan.table', compact('pendaftarans')); // Kirim data ke view
    }
    public function edit($nisn)
    {
        // Ambil data pendaftaran berdasarkan NISN
        $pendaftaran = Pendaftaran::where('nisn', $nisn)->firstOrFail();

        // Kirim data ke view edit
        return view('pendaftaran.edit', compact('pendaftaran'));
    }


   public function update(Request $request, $nisn)
{
    // Validasi data yang dikirimkan dari form edit
    $request->validate([
        'nama_lengkap' => 'required|max:100',
        'tempat_lahir' => 'required|max:100',
        'tanggal_lahir' => 'required|date',
        'alamat' => 'required',
        'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        'nisn' => 'required|max:10|unique:pendaftaran,nisn,'.$nisn.',nisn', // Validasi NISN unik
        'nomor_telepon' => 'required|max:15',
        'foto_siswa' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
    ]);

    try {
        // Ambil data pendaftaran berdasarkan NISN
        $pendaftaran = Pendaftaran::where('nisn', $nisn)->firstOrFail();

        // Simpan NISN baru untuk update
        $newNisn = $request->nisn;

        // Update data pendaftaran
        $pendaftaran->update([
            'nama_lengkap' => $request->nama_lengkap,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nisn' => $newNisn, // NISN baru
            'nomor_telepon' => $request->nomor_telepon,
        ]);

        // Perbarui NISN di tabel uploads
        upload::where('nisn', $nisn)->update(['nisn' => $newNisn]);

        // Proses upload file jika ada file yang diunggah
        if ($request->hasFile('foto_siswa')) {
            $file = $request->file('foto_siswa');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/foto_siswa', $filename);

            // Update kolom foto_siswa di database
            $pendaftaran->foto_siswa = $filename;
            $pendaftaran->save();
        }

        // Redirect kembali ke halaman daftar pendaftaran dengan pesan sukses
        return redirect()->route('pendaftaran.index')->with('success', 'Data siswa berhasil diperbarui.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}

        public function destroy($nisn)
        {
            $pendaftaran = Pendaftaran::where('nisn', $nisn)->first();

            if ($pendaftaran) {
                // Hapus data terkait di uploads secara otomatis
                $pendaftaran->uploads()->delete();
                $pendaftaran->delete();

                return redirect()->route('pendaftaran.index')->with('success', 'Data berhasil dihapus.');
            } else {
                return redirect()->route('pendaftaran.index')->with('error', 'Data tidak ditemukan.');
            }
        }




        public function getSnapToken(Request $request)
        {
            // Validasi data dari form, tetapi jangan simpan ke database
            $request->validate([
                'nama_lengkap' => 'required|string|max:100',
                'nisn' => 'required|string|max:10|unique:pendaftaran,nisn',
                'nomor_telepon' => 'required|string|max:15',
                // tambahkan validasi lainnya sesuai kebutuhan
            ]);

            // Set konfigurasi Midtrans
            Config::$serverKey = 'SB-Mid-server-eToNXtqVL44uwLu-4BMV9hJn';
            Config::$isProduction = false;
            Config::$isSanitized = true;
            Config::$is3ds = true;

            // Buat order ID unik menggunakan NISN dan timestamp
            $orderID = 'ORDER-' . $request->nisn . '-' . time();

            // Buat parameter untuk Midtrans
            $params = [
                'transaction_details' => [
                    'order_id' => $orderID,
                    'gross_amount' => 700000, // Jumlah pembayaran
                ],
                'customer_details' => [
                    'first_name' => $request->nama_lengkap,
                    'phone' => $request->nomor_telepon,
                    'email' => $request->email ?? 'noemail@example.com',
                ],
            ];

            try {
                // Ambil Snap token
                $snapToken = Snap::getSnapToken($params);

                return response()->json([
                    'success' => true,
                    'data' => ['snap_token' => $snapToken]
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal mendapatkan token pembayaran',
                    'error' => $e->getMessage()
                ], 500);
            }
        }

        public function confirm(Request $request)
        {
            // Validasi ulang data jika diperlukan
            $request->validate([
                'nama_lengkap' => 'required|string|max:100',
                'nisn' => 'required|string|max:10|unique:pendaftaran,nisn',
                'nomor_telepon' => 'required|string|max:15',
                'payment_status' => 'required|string', // Pastikan ada status pembayaran
            ]);

            // Simpan data ke database setelah pembayaran sukses
            if ($request->payment_status === 'success') {
                $data = $request->all();
                Pendaftaran::create($data);

                return response()->json(['success' => true, 'message' => 'Data pendaftaran berhasil disimpan']);
            } else {
                return response()->json(['success' => false, 'message' => 'Pembayaran belum selesai'], 400);
            }
        }
    }
