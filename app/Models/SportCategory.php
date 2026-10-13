<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SportCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon',
    ];

    // Relasi: Kategori memiliki banyak Field (lapangan)
    public function fields()
    {
        return $this->hasMany(Field::class);
    }
}