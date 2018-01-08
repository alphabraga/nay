<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;

    use EntrustUserTrait; // add this trait to your user model

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
    protected $fillable = ['name', 'email', 'password', 'username', 'activated', 'validity'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    protected $dates = ['validity'];


    public function getPhoto()
    {
        $photo = 'images/users/' . $this->id . '.png';

        $defaultPhoto = 'images/users/user.png';

        return \File::exists( public_path($photo))? $photo:$defaultPhoto;
    }

    public function sales()
    {
        return $this->hasMany('App\Nay\Model\SalesModel', 'created_by');
    }

}
