<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceOneSignal extends Model
{
    use HasFactory;

    protected $table = 'device_onesignals';

    protected $fillable = [
        'device_type',
        'language',
        'game_version',
        'device_model',
        'device_os',
        'notification_types',
        'user_id'
    ];

    protected $hidden = [];
}
