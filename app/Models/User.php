<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'phone',
        'branch_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function branch(){
        return $this->belongsTo(Branch::class);
    }
    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }
    public function suppliers(){
        return $this->hasMany(Supplier::class);
    }
    public function products(){
        return $this->hasMany(Product::class);
    }
    public function bankdetails(){
        return $this->hasMany(Bankdetail::class);
    }

    public function hasAnyRoles($roles){
        return null !== $this->roles()->whereIn('name',$roles)->first();
    }
    public function hasAnyRole($role){
        return null !== $this->roles()->where('name',$role)->first();
    }
    public function loginaudits(){
        return $this->hasMany(Loginaudit::class);
    }
}
