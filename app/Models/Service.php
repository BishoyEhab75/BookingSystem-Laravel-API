<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';

    protected $fillable = [
        'business_id',
        'name',
        'description',
        'price',
    ];

    public function business() {
        return $this->belongsTo(Business::class);
    }
}
