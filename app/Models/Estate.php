<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estate extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'location',
        'address1',
        'address2',
        'city',
        'area',
        'price',
        'description',
        'slug',
        'visibility',
        'approved',
    ];  


    public function user()
    {
        return $this->belongsTo(User::class);
    }  
}

	