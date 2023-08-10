<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;



class Verification extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','project_id','requirement_id','meeting_id','moc_id','poc_id','witness_id','remarks'];

    public function requirement(): BelongsTo
    {
        return $this->belongsTo(Requirement::class);
    }

    // Accessor to get the dgate object of the verififcation
    public function getDgateAttribute()
    {
        return Meeting::find($this->meeting_id);
    }

    // Accessor to get the moc object of the verififcation
    public function getMocAttribute()
    {
        return Moc::find($this->moc_id);
    }

    public function poc(): HasOne
    {
        return $this->hasOne(Poc::class,'id');
    }

    // Accessor to get the poc object of the verififcation
    public function getPocAttribute()
    {
        return Poc::find($this->poc_id);
    }

    // Accessor to get the witness object of the verififcation
    public function getWitnessAttribute()
    {
        return Witness::find($this->witness_id);
    }




    public function getDecisionGateAttribute()
    {
        return Meeting::find($this->meeting_id)->name;
    }

    public function getMocNameAttribute()
    {
        return Moc::find($this->moc_id)->name;
    }

    public function getPocNameAttribute()
    {
        return Poc::find($this->poc_id)->name;
    }

    public function getWitnessNameAttribute()
    {
        return Witness::find($this->witness_id)->name;
    }

}
