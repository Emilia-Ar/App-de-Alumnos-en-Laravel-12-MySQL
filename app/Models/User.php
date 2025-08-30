<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'professional_url',
        'photo_path',
        'is_admin',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin' => 'boolean',
    ];

    // Opcional: Accesor para obtener el enlace de WhatsApp listo para usar
    public function getWhatsappUrlAttribute(): ?string
    {
        if (!$this->phone) return null;
        $prefix = config('contact.whatsapp_prefix', '54');
        $digits = preg_replace('/\D/', '', $this->phone);
        if ($digits === '') return null;
        return "https://wa.me/{$prefix}{$digits}";
    }
}