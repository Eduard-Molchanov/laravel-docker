<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        "company_id",
        "title",
        "description",
        "logo",
        "photos",
        "working_hours",
        "office_addresses",
        "inn",
        "ogrn",
        "kpp",
        "full_name",
        "short_name",
        "license",
        "insurance_products",
        'email',
    ];

    public function insuranceCompany ()
    {
        return $this->belongsTo(InsuranceCompany::class);
    }


}
