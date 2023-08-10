<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Traits\HasUpdatedBy;

class Company extends Model
{
    use HasFactory;
    use HasUpdatedBy;

    protected $fillable = ['user_id','updated_uid','name', 'fullname'];

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }
}
