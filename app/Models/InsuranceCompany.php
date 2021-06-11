<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsuranceCompany extends Model
{
    use HasFactory;

    protected $fillable = [
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
    ];

    public function agentApplication ()
    {
        return $this->hasMany(AgentApplication::class);
    }

    public function insurancePolicy ()
    {
        return $this->hasMany(InsurancePolicy::class);
    }

    public function agent ()
    {
        return $this->hasMany(Agent::class);
    }
}
