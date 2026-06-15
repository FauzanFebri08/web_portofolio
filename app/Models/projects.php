<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $fillable = [
        'user_id', 'project_title', 'project_type', 'client_name', 
        'role', 'start_date', 'end_date', 'is_ongoing', 
        'description', 'technologies', 'project_url', 'github_url', 'thumbnail'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}