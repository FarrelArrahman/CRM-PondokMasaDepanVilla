<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    use HasFactory;

    protected $table = 'tb_pertanyaan';
    protected $primaryKey = 'id_pertanyaan';
    public $timestamps = false;
    protected $dates = ['tgl_input'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_periode',
        'id_user',
        'tgl_input',
        'pertanyaan',
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
        return $this->hasOne(Periode::class, 'id_periode', 'id_periode');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id_user', 'id_user');
    }

    public function hasilKuesioner()
    {
        return $this->belongsTo(HasilKuesioner::class, 'id_pertanyaan', 'id_pertanyaan');
    }
}
