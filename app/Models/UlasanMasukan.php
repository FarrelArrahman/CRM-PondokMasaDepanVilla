<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UlasanMasukan extends Model
{
    use HasFactory;

    protected $table = 'tb_ulasan_masukan';
    protected $primaryKey = 'id_ulasan_masukan';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_responden',
        'id_periode',
        'ulasan_masukan',
        'tgl_input',
        'keterangan',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        // 
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        //
    ];

    public function responden()
    {
        return $this->hasOne(Responden::class, 'id_responden', 'id_responden');
    }

    public function periode()
    {
        return $this->hasOne(Periode::class, 'id_periode', 'id_periode');
    }
}
