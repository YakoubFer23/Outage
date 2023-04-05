<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;



class Outage extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'outages';
    protected $fillable = [
        'name',
        'wilaya',
        'image',
        'status'
    ];
    
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['name']);
        // Chain fluent methods for configuration options

    }
}
