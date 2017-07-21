<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{


	public function __construct()
	{
        $this->middleware('auth');

        $pluckedRoles = array();

        $data =[ 
           			'controller'        => (new \ReflectionClass($this))->getShortName(),
          			'configuracao'      => \App\Nay\Model\ConfigurationsModel::get(),
          			'userDefiniedRoles' => $pluckedRoles,
                'usuario'           => \Auth::user()   
        		];

		    view()->share($data);
	}

}
