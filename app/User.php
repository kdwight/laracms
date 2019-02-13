<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    const ADMIN_TYPE = 'admin';

    protected $fillable = ['order', 'username', 'password', 'type', 'status', 'created_by', 'updated_by', 'last_login_at', 'last_login_ip', 'last_user_agent'];
    protected $hidden = ['password', 'remember_token', 'order'];
    protected $dates = ['deleted_at'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_by = auth()->id();
        });

        static::updating(function ($model) {
            $model->updated_by = auth()->id();
        });
    }

    public function isAdmin()
    {
        return $this->type === self::ADMIN_TYPE;
    }

    public function hasAccess()
    {
        $type = $this->type;
        return Role::whereName($type)->first();
    }
}
