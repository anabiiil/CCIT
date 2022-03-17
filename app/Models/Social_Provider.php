<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social_Provider extends Model
{
    use HasFactory;
    protected $table = "social_providers";
    protected $fillable = ['provider','provider_id','user_id'];

    /**
     * Get the user that owns the Social_Provider
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
