<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "cost_per_year",
        "description",
        "agent_id",
        "advantages",
        "photos",
        "cost_for_6_months",
        "cost_per_month",
        "amount_of_discount",
        "product_category_id",
        "status",
        "offer_expiration_date",
        "options",
    ];

    public function agents ()
    {
        return $this->belongsToMany(Agent::class);
    }

    public function insurancePolicy ()
    {
        return $this->hasMany(InsurancePolicy::class);
    }

    public function productCategory ()
    {
        return $this->belongsTo(ProductCategory::class);
    }
    public function 

}
