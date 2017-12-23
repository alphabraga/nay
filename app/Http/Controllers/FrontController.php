<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{


	public function __construct()
	{
    $this->middleware(function ($request, $next)
    {

      $routes = \Route::getCurrentRoute()->getName();

      $user = \Auth::user();

      $roles = $user->roles->pluck('name');

      view()->share('controller',  (new \ReflectionClass($this))->getShortName());
      view()->share('currentRouteName',  explode('.', $routes)[0]);
      view()->share('configuracao', \App\Nay\Model\ConfigurationsModel::get());
      view()->share('userDefiniedRoles', null);
      view()->share('photo',          null);
      view()->share('usuarioLogado', \Auth::user());
      view()->share('usuario', $user);
      view()->share('roles', $roles);   

      return $next($request);

    });
	}
}
