<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "insurance_company",
        "position",
        "the_photo",
    ];

    public function user ()
    {
        return $this->belongsTo(User::class);
    }

    public function insurancePolicy ()
    {
        return $this->hasMany(InsurancePolicy::class);
    }

    public function products ()
    {
        return $this->belongsToMany(Product::class);
    }

    public function insuranceCompany ()
    {
        return $this->belongsTo(InsuranceCompany::class);
    }
}
