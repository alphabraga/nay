<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ShippingCompanyController extends FrontController
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
                                 ['data' => 'action', 'title' => 'Ação', 'orderable' => false, 'searchable' => false]  
                                ]
                ];        

        return view('shippingcompany.index')->with('grid', $grid);

    }

    public function search()
    {

        return DataTables::of(\App\Nay\Model\ShippingCompanyModel::select('id', 'name'))
        ->setRowId('id')
        ->addColumn('action', function($object)
        {
            return '<div id="table-painel" class="btn-group">
                <a href="' . \URL::to("shippingcompany/" . $object->id . "/edit") . '" title="" data-id="' . $object->id . '" class="btn btn-primary btn-xs tooltipBtn edit" data-original-title="Alterar"   title="Editar"  data-toggle="tooltip" data-placement="top">
                    <i class="fa fa-pencil"></i>
                </a>
              <a href="' . \URL::to("shippingcompany/" . $object->id) . '" title="" data-id="' . $object->id . '" data-token="' . csrf_token() . '" class="btn btn-danger btn-xs tooltipBtn delete-link" data-original-title="Excluir"   title="Excluir"  data-toggle="tooltip" data-placement="top">
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
        return view('shippingcompany.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $object = new \App\Nay\Model\ShippingCompanyModel();

        $object->name               = $request->input('name');
        $object->description        = $request->input('description');
        $object->tags               = $request->input('tags');
        $object->slug               = str_slug($request->input('name'));

        $object->save();

        return redirect('shippingcompany/' . $object->id);
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
                    'object' => \App\Nay\Model\ShippingCompanyModel::find($id),
                    'showMode' => true
                ];

        return view('shippingcompany.update')->with($data);
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
                    'object' => \App\Nay\Model\ShippingCompanyModel::find($id),
                    'showMode' => false
                ];


        return view('shippingcompany.update')->with($data);
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
        $object = \App\Nay\Model\ShippingCompanyModel::find($id);

        $object->name               = $request->input('name');
        $object->description        = $request->input('description');
        $object->tags               = $request->input('tags');
        $object->slug               = str_slug($request->input('name'));
        
        $object->save();

        return redirect('shippingcompany/' . $object->id);
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
