<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacient extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'user_id'];

    public function wheelchairs()
    {
        return $this->hasMany(Wheelchair::class);
    }
}
