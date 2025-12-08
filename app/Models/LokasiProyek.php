<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LokasiProyek extends Model
{
    protected $table = 'lokasi_proyek';
    protected $primaryKey = 'lokasi_id';
    protected $guarded = [];

    // SETIAP lokasi hanya milik 1 proyek
    public function proyek()
    {
        return $this->belongsTo(Proyek::class, 'proyek_id', 'proyek_id');
    }
}
