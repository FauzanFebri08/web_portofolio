<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Skills extends Model
{
    
    protected $table = 'skills';

    protected $fillable = [
        'user_id', 
        'skill_name', 
        'proficiency_level', 
        'category'
    ];

    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}