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
                                 ['data' => 'name', 'title' => 'Nome'],
                                 ['data' => 'nickname', 'title' => 'Apelido'],
                                 ['data' => 'phone', 'title' => 'Telefone'],
                                 ['data' => 'cellphone', 'title' => 'Celular'],
                                 ['data' => 'action', 'title' => 'Ação', 'orderable' => false, 'searchable' => false]  
                                ]
                ];        

        return view('clients.index')->with('grid', $grid);
    }

    public function search()
    {

        return DataTables::of(\App\Nay\Model\EntitiesModel::select('id', 'entity_category', 'name', 'nickname', 'phone', 'cellphone')->where('entity_category', '=', '0')->OrWhere('entity_category', '=', '2'))
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
        $object = new \App\Nay\Model\EntitiesModel();

        return view('clients.form')->with(['showMode' => false, 'object' => $object]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
                                'name' => 'required'
                            ]);

        $client = new \App\Nay\Model\EntitiesModel();

        \App\Nay\Model\EntitiesModel::create($request->all());

        $client->name = $request->input('name');

        $client->save();

        return redirect('clients/' . $client->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $object  = \App\Nay\Model\EntitiesModel::find($id);

        if($object === null)
        {
            \Session::flash('flash_message','Não encontramos informação desejada');

            return $this->index();            
        }    

        $data = [
                    'object'  => $object,
                    'showMode'=> true
                ];

        return view('clients.form')->with($data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = \App\Nay\Model\EntitiesModel::find($id);

        return view('clients.form')->with(['object' => $object, 'showMode' => false]);
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
        $object = \App\Nay\Model\EntitiesModel::find($id);

        $object->update($request->all());
        
        $object->name = $request->input('name');
        
        $object->save();

        return redirect('clients/' . $object->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $afectedRows = \App\Nay\Model\EntitiesModel::destroy($id);        

            return response()->json(['afectedRows' => $afectedRows, 'error' => null]);
        }
        catch (\Illuminate\Database\QueryException $e)
        {

            return response()->json(['afectedRows' => null, 'error' => $e->getCode()]);             
        }
    }

}