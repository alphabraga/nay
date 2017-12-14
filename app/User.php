<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The 
     *
     * @var array
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];



    public function getPhoto()
    {
        $photo = 'images/users/' . $this->id . '.png';

        $defaultPhoto = 'images/users/user.png';

        return \File::exists( public_path($photo))? $photo:$defaultPhoto;
    }
}
