<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Laravolt\Avatar\Avatar;

class ProvidersController extends FrontController
{


    public function __construct()
    {
       parent::__construct();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grid = [
                    'header' => [
                                 ['data' => 'id', 'title' => 'ID'],
                                 ['data' => 'name', 'title' => 'NOME'],
                                 ['data' => 'color', 'title' => 'COR'],
                                 ['data' => 'phone', 'title' => 'TELEFONE'],
                                 ['data' => 'action', 'title' => 'Ação', 'orderable' => false, 'searchable' => false]  
                                ]
                ];        

        return view('providers.index')->with('grid', $grid);
    }

    public function search()
    {

       return DataTables::of(\App\Nay\Model\EntitiesModel::select('id', 'name', 'phone', 'color')->where('entity_category', '=', '1')->OrWhere('entity_category', '=', '2'))
        ->setRowId('id')
        ->addColumn('color', function($object)
        {
            return '<div style="color: ' . $object->color . '; background-color:' . $object->color . '">' . $object->color . '</div>';

        })
        ->addColumn('action', function($object)
        {
            return '<div id="table-painel" class="btn-group">
                <a href="' . \URL::to("providers/" . $object->id . "/edit") . '" title="" data-id="' . $object->id . '" class="btn btn-primary btn-xs tooltipBtn edit" data-original-title="Alterar"   title="Editar"  data-toggle="tooltip" data-placement="top">
                    <i class="fa fa-pencil"></i>
                </a>
              <a href="' . \URL::to("providers/" . $object->id) . '" title="" data-id="' . $object->id . '" data-token="' . csrf_token() . '" class="btn btn-danger btn-xs tooltipBtn delete-link" data-original-title="Excluir"   title="Excluir"  data-toggle="tooltip" data-placement="top">
                    <i class="fa fa-times "></i>
                </a>
            </div>';

        })
        ->rawColumns(['action', 'color'])
        ->make(true);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data = [
                    'object'   => new \App\Nay\Model\EntitiesModel(),
                    'showMode' => false,

                ];

        return view('providers.form')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $object = new \App\Nay\Model\EntitiesModel();

        $this->validate($request, [ 'name' => 'required|unique:providers,name', 'color' => 'required']);

        $formData         = $request->all();
        $formData['slug'] = str_slug($formData['name']);
        $formData['entity_category'] = 2;

        $object->create($formData);

        $avatar = new Avatar();
        $avatar->create($object->name)->save(public_path('images/providers/' . $object->id . '.png'));

        return redirect('providers/' . $object->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data = [
                    'object' => \App\Nay\Model\EntitiesModel::find($id),
                    'showMode' => true

                ];

        return view('providers.form')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
                    'object' => \App\Nay\Model\EntitiesModel::find($id),
                    'showMode' => false

                ];

        return view('providers.form')->with($data);
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

        $this->validate($request, [ 'name' => 'required|unique:brands,name,' . $object->id, 'color' => 'required', 'cellphone' => 'required']);

        $formData         = $request->all();
        $formData['slug'] = str_slug($formData['name']);

        $object->update($formData);

        return redirect('providers/' . $object->id);
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
