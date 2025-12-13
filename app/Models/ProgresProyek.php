<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProgresProyek extends Model
{
    protected $table = 'progres_proyek';
    protected $primaryKey = 'progress_id';
    
    // PERBAIKAN: Hapus guarded atau sesuaikan
    // protected $guarded = ['progress_id']; // Ini bisa menyebabkan masalah
    
    protected $fillable = [
        'proyek_id',
        'tahap_id',
        'persen_real',
        'tanggal',
        'catatan',
        'foto_progres'
    ];

    protected $casts = [
        'tanggal' => 'date',
        'persen_real' => 'decimal:2'
    ];

    // PERBAIKAN: Tambahkan ini untuk route model binding
    public function getRouteKeyName()
    {
        return 'progress_id'; // Gunakan primary key untuk route binding
    }

    public function proyek(): BelongsTo
    {
        return $this->belongsTo(Proyek::class, 'proyek_id', 'proyek_id');
    }

    public function tahapan(): BelongsTo
    {
        return $this->belongsTo(TahapanProyek::class, 'tahap_id', 'tahap_id');
    }
}