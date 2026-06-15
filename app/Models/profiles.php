<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profiles extends Model
{
    protected $fillable = ['user_id', 'description', 'professional_vision', 'mission', 'location', 'date_of_birth', 'avatar'];
    public function user() { return $this->belongsTo(User::class, 'user_id'); }
}