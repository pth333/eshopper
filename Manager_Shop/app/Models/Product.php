<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    protected $fillable = ['name','price','feature_image_path','content','user_id','category_id','feature_image_name'];
    protected $attributes = ['views_count' => 0];
    public function images(){
        return $this->hasMany(ProductImage::class, 'product_id');
    }
    public function tags(){
        return $this
        ->belongsToMany(Tag::class, 'product_tags','product_id','tag_id')
        ->withTimestamps();
    }
    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }
    use HasFactory;
    use SoftDeletes;
}
