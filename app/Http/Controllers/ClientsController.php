<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ClientsController extends FrontController
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

        $grid = [
                    'header' => [
                                 ['data' => 'id', 'title' => 'ID'],
                                 ['data' => 'name', 'title' => 'NOME'],
                                 ['data' => 'phone', 'title' => 'Telefone'],
                                 ['data' => 'action', 'title' => 'Ação', 'orderable' => false, 'searchable' => false]  
                                ]
                ];        

        return view('clients.index')->with('grid', $grid);
    }

    public function search()
    {

        return DataTables::of(\App\Nay\Model\ClientsModel::select('id', 'name', 'phone'))
        ->setRowId('id')
        ->addColumn('action', function($object)
        {
            return '<div id="table-painel" class="btn-group">
                <a href="' . \URL::to("clients/" . $object->id . "/edit") . '" title="" data-id="' . $object->id . '" class="btn btn-primary btn-xs tooltipBtn edit" data-original-title="Alterar"   title="Editar"  data-toggle="tooltip" data-placement="top">
                    <i class="fa fa-pencil"></i>
                </a>
              <a href="' . \URL::to("clients/" . $object->id) . '" title="" data-id="' . $object->id . '" data-token="' . csrf_token() . '" class="btn btn-danger btn-xs tooltipBtn delete-link" data-original-title="Excluir"   title="Excluir"  data-toggle="tooltip" data-placement="top">
                    <i class="fa fa-times "></i>
                </a>
            </div>';

        })
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('clients.create')->with('clients');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $c = new \App\Nay\Model\ClientsModel();

        $c->name                  = $request->input('name');        
        $c->phone                 = $request->input('phone');       
        $c->cellphone             = $request->input('cellphone');   
        $c->cpf                   = $request->input('cpf');
        $c->shipping_address      = $request->input('shipping_address');
        $c->shipping_number       = $request->input('shipping_number');
        $c->shipping_neighborhood = $request->input('shipping_neighborhood');
        $c->shipping_postalcode   = $request->input('shipping_postalcode');
        $c->shipping_city         = $request->input('shipping_city');
        $c->shipping_state        = $request->input('shipping_state');
        $c->shipping_country      = $request->input('shipping_country');
        $c->shipping_complement   = $request->input('shipping_complement');
        $c->billing_address       = $request->input('billing_address');
        $c->billing_number        = $request->input('billing_number');
        $c->billing_neighborhood  = $request->input('billing_neighborhood');
        $c->billing_postalcode    = $request->input('billing_postalcode');
        $c->billing_city          = $request->input('billing_city');
        $c->billing_state         = $request->input('billing_state');
        $c->billing_country       = $request->input('billing_country');
        $c->billing_complement    = $request->input('billing_complement');

        $c->save();

        return redirect('clients/' . $c->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

         $object  = \App\Nay\Model\ClientsModel::find($id);

        if($object === null)
        {
            \Session::flash('flash_message','Não encontramos informação desejada');

            return $this->index();            
        }    

        return view('clients.update')->with($data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = \App\Nay\Model\ClientsModel::find($id);

        return view('clients.update')->with(['object' => $object]);
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
        $c = \App\Nay\Model\ClientsModel::find($id);

        $c->name                  = $request->input('name');        
        $c->phone                 = $request->input('phone');       
        $c->cellphone             = $request->input('cellphone');   
        $c->cpf                   = $request->input('cpf');
        $c->shipping_address      = $request->input('shipping_address');
        $c->shipping_number       = $request->input('shipping_number');
        $c->shipping_neighborhood = $request->input('shipping_neighborhood');
        $c->shipping_postalcode   = $request->input('shipping_postalcode');
        $c->shipping_city         = $request->input('shipping_city');
        $c->shipping_state        = $request->input('shipping_state');
        $c->shipping_country      = $request->input('shipping_country');
        $c->shipping_complement   = $request->input('shipping_complement');
        $c->billing_address       = $request->input('billing_address');
        $c->billing_number        = $request->input('billing_number');
        $c->billing_neighborhood  = $request->input('billing_neighborhood');
        $c->billing_postalcode    = $request->input('billing_postalcode');
        $c->billing_city          = $request->input('billing_city');
        $c->billing_state         = $request->input('billing_state');
        $c->billing_country       = $request->input('billing_country');
        $c->billing_complement    = $request->input('billing_complement');

        $c->save();

        return redirect('clients/' . $c->id);
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


}
