<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{


	public function __construct()
	{
        //$this->middleware('auth');

        /*$pluckedRoles = array();

        $photo = null;

        /*if(\Auth::check())
        {

          $userDefiniedRoles = \DB::select('select roles.id, roles.name, roles.display_name, roles.description 
                                from role_user
                                left join roles on roles.id = role_user.role_id
                                where role_user.user_id = ?', [\Auth::user()->id]);

          $userDefiniedRoles = collect($userDefiniedRoles);

          $pluckedRoles = $userDefiniedRoles->pluck('name');

          $photo = glob('usuarios/' . \Auth::user()->id . '.*');

          (is_array($photo) && count($photo)>0)? $photo = $photo[0]: $photo = null;

        }

        $data =[ 
           			'controller'        => (new \ReflectionClass($this))->getShortName(),
          			'configuracao'      => \App\Nay\Model\ConfigurationsModel::get(),
          			'userDefiniedRoles' => $pluckedRoles,
                'photo'             => $photo,
                'usuarioLogado'     => \Auth::user(),
                'usuario'           => \Auth::user()   
        		];

		    view()->share($data);*/
	}

}