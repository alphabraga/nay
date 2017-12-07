<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfigurationController extends FrontController
{

    public function __construct()
    {
       parent::__construct();
    }


    /**
     * Display teh system configuration in json
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	return response()->json(\App\Nay\Model\ConfigurationsModel::get());
    }

    public function system()
    {
        return response()->json(config('app'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$configuration = \App\Nay\Model\ConfigurationsModel::get();

        $defaultClient = \App\Nay\Model\ClientsModel::find($configuration->default_client_id);

        $data = [
                    'object'        => $configuration,
                    'defaultClient' => $defaultClient
                ];

    	return view('configuration.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $configuration = \App\Nay\Model\ConfigurationsModel::get();

    	return view('configuration.edit')->with(['object' => $configuration]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	$config = \App\Nay\Model\ConfigurationsModel::get();

        $config->system_name   = $request->input('system_name');
        $config->fantasy_name  = $request->input('fantasy_name');
        $config->social_name   = $request->input('social_name');
        $config->description   = $request->input('description');
        $config->cnpj          = $request->input('cnpj');
        $config->administrator_system_email          = $request->input('administrator_system_email');
        $config->tags          = $request->input('tags');
        $config->email         = $request->input('email');
        $config->address       = $request->input('address');
        $config->postal_code   = $request->input('postal_code');
        $config->phone         = $request->input('phone');
        $config->cellphone     = $request->input('cellphone');
        $config->latitude      = $request->input('latitude');
        $config->longitude     = $request->input('longitude');
        $config->country_code  = $request->input('country_code');
        $config->state_code    = $request->input('state_code');
        $config->pagseguro_api_key = $request->input('pagseguro_api_key');

    	$config->save();

    	return redirect('/configuration/1');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function about()
    {

        $config = new \App\Nay\Model\ConfigurationsModel();

        $data = [
                    'php'      => phpversion(),
                    'database' => $config->getDatabaseInfo(),
                    'hostname' => gethostname(),
                    'linux'    => php_uname(),
                    'data'     => date('d/m/Y H:i:s'),
                    'timezone' => date_default_timezone_get(),
                ];

        return view('configuration.about')->with($data);
    }
}
