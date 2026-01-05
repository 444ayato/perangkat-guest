<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kontraktor extends Model
{
    protected $table = 'kontraktor';
    
    protected $primaryKey = 'kontraktor_id';
    
    public $incrementing = true;
    
    protected $fillable = [
        'nama_kontraktor',
        'penanggung_jawab',
        'kontak',
        'alamat',
        'email',
        'telepon',
        'npwp'
    ];
    
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
    
    // Relasi dengan proyek - UPDATE INI
    public function proyek()
    {
        return $this->hasMany(Proyek::class, 'kontraktor_id', 'kontraktor_id');
    }
}