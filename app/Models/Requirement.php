<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\Attachment;
use App\Models\Endproduct;
use App\Models\Verification;
use App\Models\Meeting;



class Requirement extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','updated_uid','project_id','text','rtype','remarks','cross_ref_no'];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function endproducts(): BelongsToMany
    {
        return $this->belongsToMany(Endproduct::class);
    }

    public function verifications(): HasMany
    {
        return $this->hasMany(Verification::class);
    }


    public function attachments(): HasMany
    {
        return $this->hasMany(Attachment::class,'model_item_id')->where(['model_name'=>'requirement']);
    }


    public function dgates(): HasMany
    {
        return $this->hasMany(Meeting::class,'verifications');
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
