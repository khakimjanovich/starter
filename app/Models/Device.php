<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ip_address',
        'user_agent',
        'platform',
        'platform_version',
        'browser',
        'browser_version',
        'device_type',
        'route',
        'action',
        'payload',
        'headers',
        'count',
        'country_name',
        'country_code',
        'region_name',
        'region_code',
        'city_name',
        'zip_code',
        'latitude',
        'longitude',
    ];

    protected $casts = [
        'payload' => 'json',
        'headers' => 'json',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
