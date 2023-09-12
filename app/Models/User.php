<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Shop\ReactionComment;
use App\Models\Shop\ShopComment;
use App\Notifications\ResetPasswordNotification ;

use App\Notifications\VerifyEmailNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'phone',
        'username',
        'email',
        'password',
        'firstName',
        'lastName',
        'sex',
        'gallery_id',
        'two_factor_type',
        'description',
        'birthDay',
        'email_verified_at',
        'created_at',
        'updated_at',
        'is_staff',

    ];

    protected $guarded = [
        'is_superuser'
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

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }


    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
    public function activeCode(){
        return $this->hasMany(ActiveCode::class);
    }
    public function resetToken(){
        return $this->hasMany(ResetToken::class);
    }
    public function hasTwoFactoryAuthenticaredEnabaled(){
            return $this->two_factor_type !== 'off';
    }
    public function isTwoFactorTypeSMS(){
       // return $this->two_factor_type;
        //dd( !! $this->two_factor_type == 'SMS');
        return !! $this->two_factor_type == 'SMS';
    }


    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmailNotification());
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password']=bcrypt($value);
    }

    public function is_superuser()
    {
      return  $this->is_superuser;
    }
    public function is_staffUser()
    {
       return $this->is_staff;
    }

    public function hasPermission($permission)
    {
        return $this->permissions->contains('name',$permission->name);
    }

    public function products()
    {
       return $this->hasMany(Product::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function discounts()
    {
        return $this->belongsToMany(Discount::class);
    }

    public function reaction()
    {
        return $this->hasMany(ReactionComment::class);
    }

    public function shop_comments()
    {
        return $this->hasMany(ShopComment::class);
    }
}
