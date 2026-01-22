<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Concept extends Model
{
    protected $table = 'concepts';
    protected $fillable = [
        'nama_konsep',
        'deskripsi',
        'link_referensi',
        'event_id'
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
