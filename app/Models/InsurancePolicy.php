<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use const http\Client\Curl\PROXY_HTTP;

class InsurancePolicy extends Model
{
    use HasFactory;

    protected $fillable = [
        "agent_id",
        "company_id",
        "user_id",
        "cost",
        "product_id",
        "maximum_payment_amount",
        "effective_date",
        "expiration_date",
        "payment_date",
        "description_insurance_object",
    ];

    public function user ()
    {
        return $this->belongsTo(User::class);
    }

    public function insuranceCompany ()
    {
        return $this->belongsTo(InsuranceCompany::class);
    }

    public function agents ()
    {
        return $this->belongsTo(Agent::class);
    }

    public function products ()
    {
        return $this->belongsTo(Product::class);
    }
}
