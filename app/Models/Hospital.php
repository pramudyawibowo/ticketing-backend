<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Hospital extends Model
{
    use HasFactory, Sluggable, SluggableScopeHelpers;

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
        'name', 'slug', 'address', 'photo', 'open_time', 'close_time', 'active', 'capacity', 'phonenumber'
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function getLogoAttribute()
    {
        return $this->photo ? asset('storage/' . $this->photo) : 'https://ui-avatars.com/api/?name=' . $this->name . '&color=7F9CF5&background=EBF4FF'; 
    }
}
