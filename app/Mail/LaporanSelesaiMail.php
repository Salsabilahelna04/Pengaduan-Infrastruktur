<?php

namespace App\Mail;

use App\Models\Laporan;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class LaporanSelesaiMail extends Mailable
{
    use Queueable, SerializesModels;

    public $laporan;

    public function __construct(Laporan $laporan)
    {
        $this->laporan = $laporan;
    }

    public function build()
    {
        $email = $this->subject('Laporan Anda Telah Selesai Diproses')
                      ->view('emails.laporan_selesai');

        // Tambah lampiran foto jika ada
        if ($this->laporan->foto && Storage::disk('public')->exists($this->laporan->foto)) {
            $email->attach(storage_path('app/public/' . $this->laporan->foto), [
                'as' => 'foto_laporan.jpg',
                'mime' => 'image/jpeg'
            ]);
        }

        return $email;
    }
}
