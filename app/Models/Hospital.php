<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Hospital extends Model
{
    use HasFactory, Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source'    => 'name',
                'onUpdate'  => true
            ]
        ];
    }

    protected $fillable = [
        'name', 'slug', 'address', 'photo', 'open_time', 'close_time', 'active', 'capacity'
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
