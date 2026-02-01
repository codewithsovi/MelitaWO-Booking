<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Client extends Model
{
    protected $table = 'clients';
    protected $fillable = [
        'nama',
        'email',
        'phone',
        'alamat',
        'status',
        'package_id',
    ];

    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }

    public function event(): HasOne
    {
        return $this->hasOne(Event::class);
    }
}
 