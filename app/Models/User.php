<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;


    protected $fillable = [
        'surname',
        'name',
        'patronymic',
        'sex',
        'birthday',
        'email',
        'password',
        'nickname',
        'avatar',
        'phone',
        'api_token',
        'role_id',
    ];


    protected $hidden = [
        'password',
        'api_token',
    ];


    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function role() {
        return $this->belongsTo(Role::class);
    }
    public function addresses() {
        return $this->hasMany(Address::class);
    }
    public function orders() {
        return $this->hasMany(Order::class);
    }
    public function carts(){
        return $this->hasMany(Cart::class);
    }
}
