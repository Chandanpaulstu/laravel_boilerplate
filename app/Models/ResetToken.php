<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResetToken extends Model
{
    use HasFactory;

    protected $fillable = ['token', 'user_id', 'valid_till', 'otp'];
    protected $casts = [
        'valid_till' => 'datetime',
        'otp' => 'integer'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
