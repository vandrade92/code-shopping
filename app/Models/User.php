<?php

namespace CodeShopping\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable, SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function fill(array $attributes)
    {
         !isset($attributes['password']) ?:$attributes['password'] = bcrypt($attributes['password']);
         return parent::fill($attributes);
    }

    public function getJWTIdentifier() // Identificador do user.
    {
         return $this->id;
    }

    public function getJWTCustomClaims() //Outras informações para serem passadas no payload.
    {
         return [
              'email' => $this->email,
              'name' => $this->name,
         ];
    }

}
