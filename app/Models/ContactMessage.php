<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'subject',
        'service',
        'project_details',
        'budget',
        'contact_method',
        'is_read'
    ];

    protected $casts = [
        'is_read' => 'boolean',
    ];
}
