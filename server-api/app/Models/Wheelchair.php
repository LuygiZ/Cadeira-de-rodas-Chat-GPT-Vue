<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wheelchair extends Model
{
    use HasFactory;

    protected $fillable = ['pacient_id', 'reference_number'];

    public function pacient()
    {
        return $this->belongsTo(Pacient::class);
    }
}
