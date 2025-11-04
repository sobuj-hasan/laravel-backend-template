<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitorLog extends Model
{
    protected $fillable = [
        'ip_address',
        'user_agent',
        'device_type',
        'platform',
        'browser',
        'browser_version',
        'referer',
        'url',
        'route_name',
        'method',
        'accept_language',
        'country',
        'city',
        'is_bot',
        'session_id',
        'user_id',
    ];
}


