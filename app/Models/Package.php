<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Package extends Model
{
    protected $table = 'packages';
    protected $fillable = [
        'jenis',
        'deskripsi',
        'harga',
        'status',
    ];

    public function client():HasMany
    {
        return $this->hasMany(Client::class);
    }
}
