<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PendingUser extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * Mass assignable attributes.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'email_verified_at',
        'remember_token',
    ];

    /**
     * Override the email verification notification.
     */
    public function sendEmailVerificationNotification()
    {
        // Mengirim notifikasi verifikasi email menggunakan bawaan Laravel
        $this->notify(new \Illuminate\Auth\Notifications\VerifyEmail);
    }
}
