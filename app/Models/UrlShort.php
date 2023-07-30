<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Statistics;
class UrlShort extends Model
{
    use HasFactory;
    protected $table ="urlshort";
    protected $fillable = [
        'longUrl',
        'shortCode',
        'counter',
        'ipAddress',
    ];

    public function stats()
    {
        return $this->hasMany(Statistics::class,'id_url','id');
    }
    
}
