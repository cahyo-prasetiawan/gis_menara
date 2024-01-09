<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menara extends Model
{
    use HasFactory;

    protected $guarded =['id'];

    public function getRouteKeyName()
    {
        return 'nama';
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function Jenis()
    {
        return $this->belongsTo(Jenis::class);
    }

    

    public function scopeFilter($query, array $filters)
    { 
        //code untuk pencarian
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('nama','like', '%' . $search . '%')
            ->orwhere('tahun', 'like', '%' .$search .'%')
            ->orwhere('tinggi', 'like', '%' .$search .'%');
        });
    }

}
