<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Lapangan;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class LapanganController extends Controller
{
    public function index()
    {
        return view('admin.lapangan');
    }

    public function getData()
    {
        $lapangans = Lapangan::all();
        return response()->json([
            'success' => true,
            'message' => 'List Data lapangan berhasil ditampilkan',
            'data' => $lapangans
        ], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lapangan' => 'required|string',
            'jenis'         => 'required|string',
            'lokasi'        => 'required|string',
            'kondisi'       => 'required|string',
            'harga_per_jam' => 'required|numeric|min:0',
            'jam_buka'      => 'required|date_format:H:i',
            'jam_tutup'     => 'required|date_format:H:i|after:jam_buka',
            'kontak'        => 'nullable|string|max:20',
            'deskripsi'     => 'nullable|string',
            'gambar'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            
            // Simpan menggunakan Storage::disk('public')
            Storage::disk('public')->putFileAs('gambar', $file, $filename);

            $validated['gambar'] = $filename;
        }

        $lapangan = Lapangan::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Lapangan berhasil ditambahkan',
            'data' => $lapangan
        ], 201);
    }

    public function show(string $id)
    {
        try {
            $lapangan = Lapangan::findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Detail data lapangan',
                'data' => $lapangan
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Lapangan tidak ditemukan',
            ], 404);
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $lapangan = Lapangan::findOrFail($id);

            $validated = $request->validate([
                'nama_lapangan' => 'required|string',
                'jenis'         => 'required|string',
                'lokasi'        => 'required|string',
                'kondisi'       => 'required|string',
                'harga_per_jam' => 'required|numeric|min:0',
                'jam_buka'      => 'required|date_format:H:i',
                'jam_tutup'     => 'required|date_format:H:i|after:jam_buka',
                'kontak'        => 'nullable|string|max:20',
                'deskripsi'     => 'nullable|string',
                'gambar'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            // kalau upload gambar baru
            if ($request->hasFile('gambar')) {
                if ($lapangan->gambar) {
                    $oldImagePath = 'gambar/' . $lapangan->gambar;
                    if (Storage::disk('public')->exists($oldImagePath)) {
                        Storage::disk('public')->delete($oldImagePath);
                    }
                }

                $file = $request->file('gambar');
                $filename = time() . '_' . $file->getClientOriginalName();
                
                Storage::disk('public')->putFileAs('gambar', $file, $filename);
                $validated['gambar'] = $filename;
                
            } else {
                // Jika tidak ada gambar baru, pertahankan gambar lama
                $validated['gambar'] = $lapangan->gambar;
            }

            $lapangan->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'Lapangan berhasil diupdate',
                'data' => $lapangan
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Lapangan tidak ditemukan',
            ], 404);
        }
    }

    public function destroy(string $id)
    {
        try {
            $lapangan = Lapangan::findOrFail($id);

            if ($lapangan->gambar) {
                $imagePath = 'gambar/' . $lapangan->gambar;
                
                if (Storage::disk('public')->exists($imagePath)) {
                    Storage::disk('public')->delete($imagePath);
                } else {
                    Log::warning('Gambar tidak ditemukan di storage: ' . $imagePath);
                }
            }

            $lapangan->delete();

            return response()->json([
                'success' => true,
                'message' => 'Lapangan berhasil dihapus',
            ], 200);
            
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Lapangan tidak ditemukan',
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menghapus data',
            ], 500);
        }
    }

    public function reportPdf()
    {
        $lapangans = Lapangan::all();

        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $options->set('isHtml5ParseEnabled', true);
        $options->set('chroot', realpath(base_path()));
        $options->set('defaultFont', 'Arial');

        $dompdf = new Dompdf($options);

        $html = view('admin.laporan-lapangan-pdf', [
            'lapangans' => $lapangans
        ])->render();

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        return $dompdf->stream(
            'laporan-lapangan-olahraga.pdf',
            ['Attachment' => false] // true = auto download
        );
    }

}