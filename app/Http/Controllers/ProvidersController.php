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
                                 ['data' => 'phone', 'title' => 'TELEFONE'],
                                 ['data' => 'action', 'title' => 'Ação', 'orderable' => false, 'searchable' => false]  
                                ]
                ];        

        return view('providers.index')->with('grid', $grid);
    }

    public function search()
    {

       return DataTables::of(\App\Nay\Model\ProvidersModel::select('id', 'name', 'phone'))
        ->setRowId('id')
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
        ->make(true);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('providers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $object = new \App\Nay\Model\ProvidersModel();

        $object->name               = $request->input('name');
        $object->description        = $request->input('description');
        $object->tags               = $request->input('tags');
        $object->slug               = str_slug($request->input('name'));
        $object->personal_contact   = $request->input('personal_contact');
        $object->postal_code        = $request->input('postal_code');
        $object->address            = $request->input('address');
        $object->address_number     = $request->input('address_number');
        $object->address_complement = $request->input('address_complement');
        $object->phone              = $request->input('phone');
        $object->cellphone          = $request->input('cellphone');
        $object->email              = $request->input('email');
        $object->site               = $request->input('site');

        $object->save();

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
                    'object' => \App\Nay\Model\ProvidersModel::find($id),
                    'showMode' => true

                ];

        return view('providers.update')->with($data);
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
                    'object' => \App\Nay\Model\ProvidersModel::find($id),
                    'showMode' => false

                ];

        return view('providers.update')->with($data);
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
        $object = \App\Nay\Model\ProvidersModel::find($id);

        $this->validate($request, [ 'name' => 'required|unique:brands,name,' . $object->id]);

        $object->name               = $request->input('name');
        $object->description        = $request->input('description');
        $object->tags               = $request->input('tags');
        $object->slug               = str_slug($request->input('name'));
        $object->personal_contact   = $request->input('personal_contact');
        $object->postal_code        = $request->input('postal_code');
        $object->address            = $request->input('address');
        $object->address_number     = $request->input('address_number');
        $object->address_complement = $request->input('address_complement');
        $object->phone              = $request->input('phone');
        $object->cellphone          = $request->input('cellphone');
        $object->email              = $request->input('email');
        $object->site               = $request->input('site');

        $object->save();

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
        //
    }
}
