<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mobil extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'mobils';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'user_id',
        'nopolisi',
        'merk',
        'jenis',
        'kapasistas',
        'harga',
        'foto'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
