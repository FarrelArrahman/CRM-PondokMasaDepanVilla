<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilKuesioner extends Model
{
    use HasFactory;

    protected $table = 'tb_hasil_kuesioner';
    protected $primaryKey = 'id_hasil_kuesioner';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_responden',
        'id_pertanyaan',
        'nilai',
        'tgl_input'
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

    public function periode()
    {
        return $this->hasOneThrough(
            Periode::class, 
            Pertanyaan::class, 
            'id_pertanyaan', 
            'id_periode',
            'id_pertanyaan',
            'id_periode'
        );
    }

    public function pertanyaan()
    {
        return $this->hasOne(Pertanyaan::class, 'id_pertanyaan', 'id_pertanyaan');
    }
}
