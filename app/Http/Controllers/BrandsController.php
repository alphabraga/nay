<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrandsController extends FrontController
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
                                 ['data' => 'action', 'title' => 'Ação', 'orderable' => false, 'searchable' => false]  
                                ]
                ];

        $data = [ 'currentRouteName' => 'brands', 'grid' => $grid, 'usuario' => \Auth::user()];        

        return view('brands.index')->with($data);
    }

    public function search()
    {

        return \Datatables::of(\App\Nay\Model\BrandsModel::select('id', 'name'))
        ->setRowId('id')
        ->addColumn('action', function($object)
        {
            return '<div id="table-painel" class="btn-group">
                <a href="' . \URL::to("brands/" . $object->id . "/edit") . '" title="" data-id="' . $object->id . '" class="btn btn-primary btn-xs tooltipBtn edit" data-original-title="Alterar"   title="Editar"  data-toggle="tooltip" data-placement="top">
                    <i class="fa fa-pencil"></i>
                </a>
              <a href="' . \URL::to("brands/" . $object->id) . '" title="" data-id="' . $object->id . '" data-token="' . csrf_token() . '" class="btn btn-danger btn-xs tooltipBtn delete-link" data-original-title="Excluir"   title="Excluir"  data-toggle="tooltip" data-placement="top">
                    <i class="fa fa-times "></i>
                </a>
            </div>';

        })
        ->make(true);
    }

    public function system()
    {
    	//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data = ['usuario' => \Auth::user() , 'currentRouteName' => 'brands'];

        return view('brands.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $brand = new \App\Nay\Model\BrandsModel();

        $brand->name        = $request->input('name');
        $brand->description = $request->input('description');
        $brand->tags        = $request->input('tags');
        $brand->slug        = str_slug($request->input('name'));

        $brand->save();

        return redirect('brands/' . $brand->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

         $object  = \App\Nay\Model\BrandsModel::find($id);

        if($object === null)
        {
            \Session::flash('flash_message','Não encontramos informação desejada');

            return $this->index();            
        }    

        $data = [
                    'object'  => $object,
                    'showMode'=> true,
                    'usuario' => \Auth::user()
                ];

        return view('brands.update')->with($data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = \App\Nay\Model\BrandsModel::find($id);

        return view('brands.update')->with(['object' => $object, 'usuario' => \Auth::user()]);
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
        $object = \App\Nay\Model\BrandsModel::find($id);

        $this->validate($request, [ 'name' => 'required|unique:brands,name,' . $object->id]);

        $object->name        = $request->input('name');
        $object->description = $request->input('description');
        $object->tags        = $request->input('tags');
        $object->slug        = str_slug($request->input('name'));

        $object->save();

        return redirect('brands/' . $object->id);
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