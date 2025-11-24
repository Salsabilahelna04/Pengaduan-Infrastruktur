<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\LaporanSelesaiMail;
use App\Mail\LaporanDitolakMail;

class LaporanController extends Controller
{
    /** FORM LAPORAN BARU */
    public function index()
    {
        return view('laporan.form');
    }

    /** SIMPAN LAPORAN BARU */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'jenis_laporan' => 'required|string|max:100',
            'judul'         => 'required|string|max:150',
            'tanggal'       => 'required|date',
            'alamat'        => 'required|string|max:255',
            'keterangan'    => 'required|string|min:10',
            'foto'          => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'urgensi'       => 'required|in:Mendesak,Tidak Terlalu Mendesak',
        ]);

        $path = $request->file('foto')->store('laporan_foto', 'public');

        Laporan::create([
            'id_warga'      => Auth::id(),
            'jenis_laporan' => $validated['jenis_laporan'],
            'judul'         => $validated['judul'],
            'tanggal'       => $validated['tanggal'],
            'alamat'        => $validated['alamat'],
            'keterangan'    => $validated['keterangan'],
            'foto'          => $path,
            'urgensi'       => $validated['urgensi'],
            'status'        => 'diajukan',
            'prioritas'     => 'Sedang',
            'lokasi'        => $validated['alamat'],
        ]);

        return redirect()->route('dashboard.warga')
            ->with('success_title', 'Laporan Berhasil Dikirim')
            ->with('success_message', 'Terima kasih! Laporan kamu sudah masuk ke sistem.');
    }

    /** DASHBOARD WARGA */
    public function wargaIndex()
    {
        $laporans = Laporan::where('id_warga', Auth::id())->latest()->get();
        return view('dashboard_warga', compact('laporans'));
    }

    /** DASHBOARD ADMIN */
    public function adminIndex()
    {
        $laporans = Laporan::with('warga')->latest()->get();
        return view('dashboard_admin', compact('laporans'));
    }

    /** DETAIL LAPORAN ADMIN */
    public function adminShow($id_laporan)
    {
        $laporan = Laporan::with('warga')->findOrFail($id_laporan);
        return view('admin.detail_laporan', compact('laporan'));
    }

    /** UPDATE STATUS LAPORAN ADMIN + KIRIM EMAIL */
    public function updateStatus(Request $request, $id_laporan)
{
    $request->validate([
        'status' => 'required|in:diajukan,verifikasi,proses,selesai,ditolak',
    ]);

    $laporan = Laporan::with('warga')->findOrFail($id_laporan);

    $oldStatus = strtolower($laporan->status);
    $newStatus = strtolower($request->status);

    $laporan->status = $newStatus;
    $laporan->save();

    /** KIRIM EMAIL SELESAI */
    if ($newStatus === 'selesai' && $oldStatus !== 'selesai') {
        if ($laporan->warga && $laporan->warga->email) {
            Mail::to($laporan->warga->email)
                ->send(new LaporanSelesaiMail($laporan));
        }
    }

    /** KIRIM EMAIL DITOLAK */
    if ($newStatus === 'ditolak' && $oldStatus !== 'ditolak') {
        if ($laporan->warga && $laporan->warga->email) {
            Mail::to($laporan->warga->email)
                ->send(new LaporanDitolakMail($laporan));
        }
    }

    return redirect()->route('dashboard.admin')
        ->with('success_title', 'Status Berhasil Diupdate')
        ->with('success_message', 'Status laporan berhasil diperbarui!');
}



    /** DETAIL LAPORAN WARGA */
    public function show($id_laporan)
    {
        $laporan = Laporan::with('warga')->findOrFail($id_laporan);
        return view('laporan.detail', compact('laporan'));
    }

    /** EDIT LAPORAN */
    public function edit($id_laporan)
    {
        $laporan = Laporan::findOrFail($id_laporan);
        return view('laporan.edit', compact('laporan'));
    }

    /** UPDATE LAPORAN */
    public function update(Request $request, $id_laporan)
    {
        $laporan = Laporan::findOrFail($id_laporan);

        $validated = $request->validate([
            'judul'      => 'required|string|max:150',
            'alamat'     => 'required|string|max:255',
            'urgensi'    => 'required|in:Mendesak,Tidak Terlalu Mendesak',
            'keterangan' => 'required|string|min:10',
            'foto'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($laporan->foto) {
                Storage::disk('public')->delete($laporan->foto);
            }
            $laporan->foto = $request->file('foto')->store('laporan_foto', 'public');
        }

        $laporan->update([
            'judul'      => $validated['judul'],
            'alamat'     => $validated['alamat'],
            'urgensi'    => $validated['urgensi'],
            'keterangan' => $validated['keterangan'],
            'foto'       => $laporan->foto,
        ]);

        return redirect()->route('laporan.show', $laporan->id_laporan)
            ->with('success_title', 'Laporan Berhasil Diperbarui')
            ->with('success_message', 'Laporan kamu sudah berhasil diperbarui!');
    }
 
    /** HAPUS LAPORAN */
    public function destroy($id_laporan)
    {
        $laporan = Laporan::findOrFail($id_laporan);

        if ($laporan->foto && file_exists(public_path('storage/' . $laporan->foto))) {
            unlink(public_path('storage/' . $laporan->foto));
        }

        $laporan->delete();

        if (Auth::user()->role === 'admin') {
            return redirect()->route('dashboard.admin')
                ->with('success_title', 'Laporan Dihapus')
                ->with('success_message', 'Laporan berhasil dihapus oleh admin.');
        }

        return redirect()->route('dashboard.warga')
            ->with('success_title', 'Laporan Dihapus')
            ->with('success_message', 'Laporan kamu berhasil dihapus.');
    }
}
