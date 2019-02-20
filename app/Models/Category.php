<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use File;
use App\Tools\Upload;

class Category extends Model
{


     protected $table = 'categories';
     protected $fillable = [
         'parent_id',
         'name',
         'url',
         'image',
         'class',
         'sort',
         'type',
         'description',
         'seo_keywords',
         'seo_description'
 	];

    public function scopeSearch($query, $search){
        $search = trim(mb_strtolower($search));
        if($search)
        {
            $query->Where(   DB::raw('LOWER(name)'), 'like', "%"  . $search . "%");
            $query->OrWhere( DB::raw('LOWER(url)'), 'like', "%"  . $search . "%");
            $query->OrWhere( DB::raw('LOWER(description)'), 'like', "%"  . $search . "%");
        }
        return $query;
    }

    public function parent()
    {
        return $this->hasOne(self::class, 'id', 'parent_id');
    }

    public function categoryFilterLinks()
    {
        return $this->hasMany('App\Models\CategoryFilterLink', 'category_id', 'id');
    }

    protected static function boot()
    {
        parent::boot();

        //Событие до
        static::Saving(function($model) {
            $model->url = str_slug(empty($model->url) ? $model->name : $model->url);

            if(is_uploaded_file($model->image))
            {
                if($model->id)
                    self::find($model->id)->deleteImage();

                $upload = new Upload();
                $upload->setWidth(100);
                $upload->setHeight(100);
                $upload->setPath(config('shop.categories_path_file'));
                $upload->setFile($model->image);

                $model->image = $upload->save();
            }
        });

        static::deleting(function($obj) {
            $obj->deleteImage();
        });

    }

    public function pathImage($firstSlash = false)
    {
        if(!empty($this->image))
            return ($firstSlash ? '/' : '') . config('shop.categories_path_file') . $this->image;
        else
            false;
    }

    public function deleteImage(){
        return File::delete($this->pathImage());
    }

    public function typeValueDescription(){
        switch ($this->type) {
            case 'hit':
                return 'Hit';
                break;
            case 'new':
                return "New!";
                break;
            case 'skor':
                return "Скоро";
                break;
            default:
                return '';
        }
    }


}
