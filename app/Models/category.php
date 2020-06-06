<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slag', 'status',
    ];


    //define relation between category and post
    public function posts(){
        return $this->hasMany(post::class);
    }
}
