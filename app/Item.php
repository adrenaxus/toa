<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * Get the category that the item is in
     */
    public function category()
    {
        return $this->belongsTo('App\Item_Category');
    }
}
