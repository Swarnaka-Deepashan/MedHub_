<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    protected $fillable = ['prescription_id', 'drug', 'quantity','unit_price','total_price'];


    public function prescription()
{
    return $this->belongsTo(Prescription::class);
}

}
