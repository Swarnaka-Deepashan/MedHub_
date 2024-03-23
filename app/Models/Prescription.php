<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'image_paths', 'note', 'delivery_address'];



    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
