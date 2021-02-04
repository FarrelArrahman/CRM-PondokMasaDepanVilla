<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responden extends Model
{
    use HasFactory;

    protected $table = 'tb_responden';
    protected $primaryKey = 'id_responden';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_responden',
        'email',
        'no_hp',
        'jenis_kel',
        'alamat',
        'status',
        'keterangan',
        // 'id_user',
        // 'id_periode',
        // 'tgl_input',
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

    public function kuesioner()
    {
        return $this->hasMany(HasilKuesioner::class, 'id_responden');
    }

    public function ulasan()
    {
        return $this->hasOne(UlasanMasukan::class, 'id_responden', 'id_responden');
    }

    // public function user()
    // {
    //     return $this->hasOne(User::class, 'id_user', 'id_user');
    // }

    public function periode()
    {
        return $this->hasOne(Periode::class, 'id_periode', 'id_periode');
    }
}
