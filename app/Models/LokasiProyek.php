<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LokasiProyek extends Model
{
    protected $table = 'lokasi_proyek';

    protected $primaryKey = 'lokasi_id';

    public $incrementing = true;

    protected $fillable = [
        'proyek_id',
        'nama_lokasi',
        'lat',
        'lng',
        'geojson',
        'gambar', // ✅ WAJIB
    ];

    protected $casts = [
        'lat'        => 'float',
        'lng'        => 'float',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relasi ke proyek (one-to-one)
    public function proyek()
    {
        return $this->belongsTo(Proyek::class, 'proyek_id', 'proyek_id');
    }
}
