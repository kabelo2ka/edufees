<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use Notifiable;
    use Billable;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'second_name', 'last_name', 'phone_number', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            $user->slug = $user->getFullname();
            $user->save();
        });

    }

    public function getFullName($include_second_name = false)
    {
        $second_name = $include_second_name ? $this->second_name . ' ' : '';
        return $this->first_name . ' ' . $second_name . $this->last_name;
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /**
     * Get Donee Profiles
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function doneeProfile()
    {
        return $this->hasOne(Donee::class);
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /**
     * Include donees only.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDonees($query)
    {
        return $query->where('donee', 1);
    }

    /**
     * Include donors only.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDonors($query)
    {
        return $query->where('donee', 1);
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

    public function setSlugAttribute($value)
    {
        $slug = str_slug($value);

        if (static::whereSlug($slug)->exists()) {
            $slug = "{$slug}-" . $this->id;
        }

        $this->attributes['slug'] = $slug;
    }

}
