<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function menara()
    {
        return $this->hasMany(Menara::class);
    }

    public function retribusi()
    {
        return $this->hasMany(retribusi::class);
    }

    public function pesan()
    {
        return $this->hasMany(Pesan::class);
    }

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class);
    }

    public function scopeFilter($query, array $filters)
    { 
        //code untuk pencarian
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('name','like', '%' . $search . '%')
            ->orwhere('alamat', 'like', '%' .$search .'%');
        });
    }

}
