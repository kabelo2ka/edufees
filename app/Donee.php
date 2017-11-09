<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donee extends Model
{
    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    public $provinces;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_number', 'dob', 'gender', 'phone_number', 'address', 'city', 'postal_code', 'province', 'id_filename',
        'matric_results_filename', 'about'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->provinces = collect([
            ['id' => 1, 'name' => 'Eastern Cape'],
            ['id' => 2, 'name' => 'Free State'],
            ['id' => 3, 'name' => 'Gauteng'],
            ['id' => 4, 'name' => 'KwaZulu-Natal'],
            ['id' => 5, 'name' => 'Limpopo'],
            ['id' => 6, 'name' => 'Mpumalanga'],
            ['id' => 7, 'name' => 'North West'],
            ['id' => 8, 'name' => 'Northern Cape'],
            ['id' => 9, 'name' => 'Western Cape'],
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

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

    public function setIdFilenameAttribute($value)
    {
        $attribute_name = "back_image";
        $destination_path = public_path("uploads/ids");

        // if the image was erased
        if ($value == null) {
            // delete the image from disk
            File::delete($this->{$attribute_name});

            // set null in the database column
            $this->attributes[ $attribute_name ] = null;
        }
    }
}
