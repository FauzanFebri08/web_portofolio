<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experiences extends Model
{
    protected $fillable = ['user_id', 'position_title', 'organization_name', 'start_date', 'end_date', 'is_curent', 'description'];
    public function user() { return $this->belongsTo(User::class, 'user_id'); }
}