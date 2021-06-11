<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "description",
        "parent_category_id",
        "sorting",
        "url_slug",
    ];

    public function products ()
    {
        return $this->hasMany(Product::class);
    }

}
