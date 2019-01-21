<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AttributeValue;

class AttributeProductValue extends Model
{
    protected $table = 'attribute_product_value';
    protected $fillable = [
    	'product_id',
    	'attribute_id',
    	'value'
	];

    protected static function boot()
    {
        parent::boot();

        /*
        //Событие до
        static::Deleting(function($modal) {

            $attributeValue = AttributeValue::where('attribute_id', $modal->attribute_id, 'value', $modal->value)->first();
            if($modal->value and empty($attributeValue))
                File::delete(config('shop.attributes_path_file') . $modal->value);

        });
        */
    }

    public function product()
    {
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }

    public function attribute()
    {
        return $this->hasOne('App\Models\Attribute', 'id', 'attribute_id');
    }



}
