<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends FrontController
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
                                 ['data' => 'quantity', 'title' => 'QUANTIDADE'],
                                 ['data' => 'price', 'title' => 'PREÇO'],
                                 ['data' => 'action', 'title' => 'Ação', 'orderable' => false, 'searchable' => false]  
                                ]
                ];        

        return view('products.index')->with('grid', $grid);
    }

    public function search()
    {

        return \Datatables::of(\App\Nay\Model\ProductsModel::select('id', 'name', 'price', 'quantity'))
        ->setRowId('id')
        ->addColumn('action', function($object)
        {
            return '<div id="table-painel" class="btn-group">
                <a href="' . \URL::to("products/" . $object->id . "/edit") . '" title="" data-id="' . $object->id . '" class="btn btn-primary btn-xs tooltipBtn edit" data-original-title="Alterar"   title="Editar"  data-toggle="tooltip" data-placement="top">
                    <i class="fa fa-pencil"></i>
                </a>
              <a href="' . \URL::to("products/" . $object->id) . '" title="" data-id="' . $object->id . '" data-token="' . csrf_token() . '" class="btn btn-danger btn-xs tooltipBtn delete-link" data-original-title="Excluir"   title="Excluir"  data-toggle="tooltip" data-placement="top">
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
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $object = new \App\Nay\Model\ProductsModel();

        $object->slug           = str_slug($request->input('name'));
        $object->name           = $request->input('name');
        $object->description    = $request->input('description');
        $object->tags           = $request->input('tags');
        $object->quantity_limit = $request->input('quantity_limit');
        $object->quantity       = $request->input('quantity');
        $object->price          = $request->input('price');

        $object->save();

        return redirect('/products/' . $object->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $object = \App\Nay\Model\ProductsModel::find($id);

        $data = [
                    'object'  => \App\Nay\Model\ProductsModel::find($id),
                    'showMode'=> true 
                ];

        return view('products.update')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = \App\Nay\Model\ProductsModel::find($id);

        $data = [
                    'object'  => \App\Nay\Model\ProductsModel::find($id),
                    'showMode'=> false
                ];

        return view('products.update')->with($data);
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
        $object = \App\Nay\Model\ProductsModel::find($id);
        
        $object->slug           = str_slug($request->input('name'));
        $object->name           = $request->input('name');
        $object->description    = $request->input('description');
        $object->tags           = $request->input('tags');
        $object->quantity_limit = $request->input('quantity_limit');
        $object->quantity       = $request->input('quantity');
        $object->price          = $request->input('price');

        $object->save();

        return redirect('/products/' . $object->id);
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
