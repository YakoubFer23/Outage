<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Outage extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'outages';
    protected $fillable = [
        'name',
        'wilaya',
        'image',
        'status'
    ];


    public function getImageName($id)
    {
        $country = Countries::where('id', $id)->first();
        return $country->image;
    }
}
