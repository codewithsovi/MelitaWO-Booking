<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    protected $table = 'events';
    protected $fillable = [
        'client_id',
        'tanggal_acara',
        'waktu_acara',
        'lokasi_acara',
        'catatn_tambahan',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function wedding_people(): HasMany
    {
        return $this->hasMany(WeddingPerson::class);
    }

    public function detail_vendors(): HasMany
    {
        return $this->hasMany(DetailVendor::class);
    }
}
