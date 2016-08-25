<?php
class ProductPrice extends Eloquent{
    
    public function product()
    {
        return $this->belongsTo('Product');
    }
}
