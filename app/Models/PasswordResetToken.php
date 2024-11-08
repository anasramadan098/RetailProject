<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordResetToken extends Model
{
    use HasFactory;
    protected $fillable = ['email', 'token'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function isExpired()
    {
        return now()->gt($this->created_at->addMinutes(10));
    }
    public function generateToken()
    {
        return md5(uniqid(rand(), true));
    }
    public function generateResetToken()
    {
        $this->token = $this->generateToken();
        $this->save();
        return $this->token;
    }
    public static function findToken($email, $token)
    {
        return static::where(['email' => $email, 'token' => $token])->first();
    }
    public static function deleteExpiredTokens()
    {
        return static::where('created_at', '<', now()->subMinutes(10))->delete();
    }
    public static function createResetToken($email) {
        $token = new static;
        $token->email = $email;
        $token->generateResetToken();
        return $token;
    }
}
