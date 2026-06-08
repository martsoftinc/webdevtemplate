<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'full_name',
        'first_name',
        'last_name',
        'phone',
        'region',
        'nationality',
        'email',
        'password',
        'role',
        'email_verified_at',
        'email_verification_code',
        'email_verification_sent_at',
        'two_factor_enabled',
        'two_factor_code',
        'two_factor_sent_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'email_verification_code',
        'two_factor_code',          // never expose codes in API responses
    ];

    protected $casts = [
        'email_verified_at'          => 'datetime',
        'email_verification_sent_at' => 'datetime',
        'two_factor_sent_at'         => 'datetime',
        'password'                   => 'hashed',
        'two_factor_enabled'         => 'boolean',
    ];

    /* ── Name mutators: keep full_name in sync ── */

    public function setFirstNameAttribute(string $value): void
    {
        $this->attributes['first_name'] = $value;
        $this->attributes['full_name']  = $value . ' ' . ($this->attributes['last_name'] ?? '');
    }

    public function setLastNameAttribute(string $value): void
    {
        $this->attributes['last_name'] = $value;
        $this->attributes['full_name'] = ($this->attributes['first_name'] ?? '') . ' ' . $value;
    }

    /* ── Name accessors: fall back to full_name split if columns empty ── */

    public function getFirstNameAttribute(): string
    {
        return $this->attributes['first_name']
            ?? explode(' ', $this->attributes['full_name'] ?? '')[0]
            ?? '';
    }

    public function getLastNameAttribute(): string
    {
        if (!empty($this->attributes['last_name'])) {
            return $this->attributes['last_name'];
        }
        $parts = explode(' ', $this->attributes['full_name'] ?? '');
        array_shift($parts);
        return implode(' ', $parts);
    }

    /* ── Helpers ── */

    public function getFormattedPhoneAttribute(): string
    {
        return '+233 ' . ltrim($this->phone ?? '', '0');
    }

    public function isEmailVerificationCodeValid(): bool
    {
        return $this->email_verification_sent_at
            && now()->diffInMinutes($this->email_verification_sent_at) <= 10;
    }

    public function isTwoFactorCodeValid(): bool
    {
        return $this->two_factor_sent_at
            && now()->diffInMinutes($this->two_factor_sent_at) <= 10;
    }
}