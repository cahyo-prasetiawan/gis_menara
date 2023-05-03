<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function menara()
    {
        return $this->hasMany(Menara::class);
    }


    public function getRouteKeyName()
    {
        return 'nama';
    }

    public function scopeFilter($query, array $filters)
    { 
        //code untuk pencarian
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('nama','like', '%' . $search . '%');
        });
    }
}
