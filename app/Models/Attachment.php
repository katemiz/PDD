<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','model_name','model_item_id','original_file_name', 'mime_type','file_size','stored_file_as'];



}
