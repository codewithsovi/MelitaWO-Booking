<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailVendor extends Model
{
    protected $table = 'detail_vendors';
    protected $fillable = [
        'vendor_id',
        'nama_vendor',
        'kontak',
        'event_id'
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    } 
}
