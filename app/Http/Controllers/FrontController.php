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

      view()->share('controller',  (new \ReflectionClass($this))->getShortName());
      view()->share('currentRouteName',  explode('.', $routes)[0]);
      view()->share('configuracao', \App\Nay\Model\ConfigurationsModel::get());
      view()->share('userDefiniedRoles', null);
      view()->share('photo',          null);
      view()->share('usuarioLogado', \Auth::user());
      view()->share('usuario', \Auth::user());   

      return $next($request);

    });
	}
}
