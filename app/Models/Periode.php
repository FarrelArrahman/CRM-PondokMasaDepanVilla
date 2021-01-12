<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;

    protected $table = 'tb_periode';
    protected $primaryKey = 'id_periode';
    public $timestamps = false;
    public $dates = ['tgl_mulai', 'tgl_selesai'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_periode',
        'tahun_periode',
        'tgl_mulai',
        'tgl_selesai',
        'status'
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

    /** 
     * Nama-nama bulan dalam satu tahun.
     * 
     * @var array
    */
    protected static $bulan = [
        'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    ];

    /**
     * Menampilkan data nama-nama bulan.
     *
     * @return array $bulan
     */
    public static function getBulan()
    {
        return self::$bulan;
    }
}
