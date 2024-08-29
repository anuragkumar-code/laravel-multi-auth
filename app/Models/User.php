<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    // protected $connection = 'mysql';
    use HasApiTokens, Notifiable;
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    const ROLE_ADMIN = 'admin';
    const ROLE_INVENTORY_MANAGER = 'inventory_manager';
    const ROLE_L3_ENGINEER = 'l3_engineer';
    const ROLE_L3_TESTER = 'l3_tester';
    const ROLE_ACCOUNTS_MANAGER = 'accounts_manager';
    const ROLE_GENERAL_MANAGER = 'general_manager';

    public function getJWTIdentifier(){
        return $this->getKey();
    }

    public function getJWTCustomClaims(){
        return [];
    }

}
