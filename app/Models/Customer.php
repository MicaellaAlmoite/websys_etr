<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    // Define fillable fields for mass assignment
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
    ];

    // Define default sorting
    public function scopeOrdered($query)
    {
        return $query->orderBy('name', 'asc');
    }
}
