<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class retribusi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function getRouteKeyName()
    {
        return 'tagihan';
    }

    
    // public function scopeFilter($query, array $filters)
    // { 
    //     //code untuk pencarian
    //     $query->when($filters['search'] ?? false, function($query, $search) {
    //         return $query->where('name','like', '%' . $search . '%')
    //         ->orwhere('alamat', 'like', '%' .$search .'%');
    //     });
    // }
}
