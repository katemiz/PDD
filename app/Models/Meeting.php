<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Meeting extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','updated_uid','project_id', 'code','name'];

    public function verification(): BelongsTo
    {
        return $this->belongsToMany(Verification::class,'id','meeting_id');
    }


    public function getProjectNameAttribute()
    {
        return Project::find($this->project_id)->code;
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

}
