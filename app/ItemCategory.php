<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    /**
     * Get the items for an item_category
     */
    public function items()
    {
        return $this->hasMany('App\Item');
    }
}
