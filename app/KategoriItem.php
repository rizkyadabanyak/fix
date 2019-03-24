<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Item;
class KategoriItem extends Model
{
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function item(){
        return $this->hasMany(Item::class);

    }
}
