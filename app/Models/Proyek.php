<?php
// app/Models/Proyek.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    protected $table = 'proyek';
    
    protected $primaryKey = 'proyek_id';
    
    public $incrementing = true;
    
    protected $fillable = [
        'kode_proyek',
        'nama_proyek',
        'tahun',
        'lokasi', // kolom string lokasi di tabel proyek
        'lokasi_id', // foreign key ke lokasi_proyek
        'kontraktor_id',
        'anggaran',
        'sumber_dana',
        'deskripsi'
    ];
    
    // Relasi ke lokasi_proyek (one-to-one)
    public function lokasi()
    {
        return $this->hasOne(LokasiProyek::class, 'proyek_id', 'proyek_id');
    }
    
    // Relasi ke kontraktor
    public function kontraktor()
    {
        return $this->belongsTo(Kontraktor::class, 'kontraktor_id', 'kontraktor_id');
    }
    
    // Relasi ke tahapan (jika ada)
    public function tahapan()
    {
        return $this->hasOne(TahapanProyek::class, 'proyek_id', 'proyek_id');
    }
    
    // Relasi ke progres
    public function progres()
    {
        return $this->hasMany(ProgresProyek::class, 'proyek_id', 'proyek_id');
    }
}