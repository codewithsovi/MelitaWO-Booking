<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WeddingPerson extends Model
{
    protected $table = 'wedding_people';
    protected $fillable = [
        'pengantin',
        'nama_lengkap',
        'nama_panggilan',
        'nama_ayah',
        'nama_ibu',
        'alamat',
        'nama_kakak',
        'nama_adik',
        'event_id'
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
