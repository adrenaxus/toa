<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{

    protected $fillable = ['name', 'description'];

    /**
     * Get the category that the item is in
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    /**
     * Get the items a character owns
     */
    public function items()
    {
        return $this->belongsToMany('App\Item');
    }    
    
    
    
}
