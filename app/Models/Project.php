<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\Company;


class Project extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','updated_uid','company_id','code', 'title'];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function endproducts(): HasMany
    {
        return $this->hasMany(Endproduct::class);
    }



    public function requirements(): HasMany
    {
        return $this->hasMany(Requirement::class);
    }

    protected function companyNameId(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => Company::find($value)->name,
        );
    }


    // Accessor to get the full name of the user
    public function getCompanyNameAttribute()
    {
        return Company::find($this->company_id)->name;
    }



    // Accessor to get the full name of the user
    public function getCreatedByNameAttribute()
    {
        $usr = User::find($this->user_id);
        return $usr->name.' '.$usr->lastname;
    }

    public function getUpdatedByNameAttribute()
    {
        $usr = User::find($this->updated_uid);
        return $usr->name.' '.$usr->lastname;
    }




}
