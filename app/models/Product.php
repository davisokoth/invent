<?php
class Product extends Eloquent {
    public function category()
    {
        return $this->belongsTo('Category');
    }

    public function price()
    {
        return $this->hasOne('ProductPrice');
    }
}