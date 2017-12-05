<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends FrontController
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

        return view('categories.index')->with('grid', $grid);
    }

    public function search()
    {

        return \Datatables::of(\App\Nay\Model\CategoriesModel::select('id', 'name'))
        ->setRowId('id')
        ->addColumn('action', function($object)
        {
            return '<div id="table-painel" class="btn-group">
                <a href="' . \URL::to("categories/" . $object->id . "/edit") . '" title="" data-id="' . $object->id . '" class="btn btn-primary btn-xs tooltipBtn edit" data-original-title="Alterar"   title="Editar"  data-toggle="tooltip" data-placement="top">
                    <i class="fa fa-pencil"></i>
                </a>
              <a href="' . \URL::to("categories/" . $object->id) . '" title="" data-id="' . $object->id . '" data-token="' . csrf_token() . '" class="btn btn-danger btn-xs tooltipBtn delete-link" data-original-title="Excluir"   title="Excluir"  data-toggle="tooltip" data-placement="top">
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
        $categories = \App\Nay\Model\CategoriesModel::all();

        return view('categories.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         $this->validate($request, [
                                        'name'       => 'required|unique:categories',
                                        'description'=> 'required',
                                        'tags'       => 'required',
                        ]);

        $c = new \App\Nay\Model\CategoriesModel();

        $c->name        = $request->input('name');
        $c->description = $request->input('description');
        $c->tags        = $request->input('tags');
        $c->slug        = str_slug($request->input('name'));
        $c->level       = $request->input('level', 1);
        $c->category_id = $request->input('category_id');

        $c->save();

        return redirect('categories/' . $c->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

         $object  = \App\Nay\Model\CategoriesModel::find($id);

        if($object === null)
        {
            \Session::flash('flash_message','Não encontramos informação desejada');

            return $this->index();            
        }    

        $categories = \App\Nay\Model\CategoriesModel::all();

        $data = [
                    'object'  => $object,
                    'categories' => $categories,
                    'showMode'=> true
                ];

        return view('categories.update')->with($data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = \App\Nay\Model\CategoriesModel::find($id);

        $categories = \App\Nay\Model\CategoriesModel::all();

        return view('categories.update')->with(['object' => $object, 'categories' => $categories]);
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
        $object = \App\Nay\Model\CategoriesModel::find($id);

        $this->validate($request, [ 'name' => 'required|unique:brands,name,' . $object->id]);

        $object->name        = $request->input('name');
        $object->description = $request->input('description');
        $object->tags        = $request->input('tags');
        $object->slug        = str_slug($request->input('name'));
        $object->level       = $request->input('level', 1);
        $object->category_id = $request->input('category_id');

        $object->save();

        return redirect('categories/' . $object->id);
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