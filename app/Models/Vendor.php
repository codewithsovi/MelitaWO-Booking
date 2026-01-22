<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vendor extends Model
{
    protected $table = 'vendors';
    protected $fillable = [
        'jenis_vendor'
    ];

    public function vendorDetails(): HasMany
    {
        return $this->hasMany(VendorDetail::class);
    }
}
