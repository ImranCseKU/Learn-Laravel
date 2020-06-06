<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Events\PostCreated;

class post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'category_id', 'title','content', 'thumbnail_path', 'status'
    ];


    //this model return data as a string format but we need "created_at" as a date format
    protected $dates = [
        'created_at'
    ];

    //Eloquent ORM Event
    protected $dispatchesEvents = [
        'created' => PostCreated::class,
        'updated' => PostUpdated::class,
        'deleted' => PostDeleted::class,
    ];
    
    //post to category Relation 
    public function category(){
        return $this->belongsTo(category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }


    
}
