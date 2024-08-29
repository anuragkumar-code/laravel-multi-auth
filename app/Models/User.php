<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    // protected $connection = 'mysql';
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


}
