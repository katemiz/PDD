<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Endproduct extends Model
{
    use HasFactory;

    protected $table = 'endproducts';
    protected $fillable = ['user_id','updated_uid','project_id','code', 'title'];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    // Accessor to get the full name of the user
    public function getProjectCodeAttribute()
    {
        return Project::find($this->project_id)->code;
    }

    public function requirements(): BelongsToMany
    {
        return $this->belongsToMany(Requirement::class);
    }

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

    // public function getNameAttribute()
    // {
    //     $usr = User::find($this->updated_uid);
    //     return $usr->name.' '.$usr->lastname;
    // }

}
