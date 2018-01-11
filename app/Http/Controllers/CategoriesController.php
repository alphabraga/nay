<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;
use Laravolt\Avatar\Avatar;

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

        return DataTables::of(\App\Nay\Model\CategoriesModel::select('id', 'name'))
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
        $object              =  new \App\Nay\Model\CategoriesModel();
        $categories          = \App\Nay\Model\CategoriesModel::all();

        $data = [
                    'object'             => $object,
                    'categories'         => $categories,
                    'showMode'   => false
                ];

        return view('categories.form')->with($data);
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
                                'name'        => 'required|unique:categories',
                                'tags'        => 'required',
                                'description' => 'required',
                                'level'       => 'required',
                                'color'       => 'required'
                            ]);

        $data = $request->all();

        $data['slug']  = str_slug($data['name']);
        $data['level'] = $request->input('level', 1);

        $c = \App\Nay\Model\CategoriesModel::create($data);

        $avatar = new Avatar();

        $avatar->create($c->name)->save(public_path('images/categories/' . $c->id . '.png'));


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

         $object             = \App\Nay\Model\CategoriesModel::find($id);
         $categories         = \App\Nay\Model\CategoriesModel::all();
         $childrenCategories = \App\Nay\Model\CategoriesModel::where('category_id' ,'=', $object->id)->get();

        if($object === null)
        {
            \Session::flash('flash_message','Não encontramos informação desejada');

            return $this->index();            
        }    

        $categories = \App\Nay\Model\CategoriesModel::all();

        $data = [
                    'object'             => $object,
                    'categories'         => $categories,
                    'childrenCategories' => $childrenCategories,
                    'showMode'           => true
                ];

        return view('categories.form')->with($data);

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
        $childrenCategories = \App\Nay\Model\CategoriesModel::where('category_id' ,'=', $object->id)->get();
        $categories = \App\Nay\Model\CategoriesModel::all();

        return view('categories.form')->with(['object' => $object, 'categories' => $categories, 'showMode' => false, 'childrenCategories' => $childrenCategories]);
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


        $request->validate([
                                'name'        =>  Rule::unique('users')->ignore($object->id),
                                'tags'        => 'required',
                                'description' => 'required',
                                'level'       => 'required'
                            ]);

        $data          = $request->all();
        $data['slug']  =  str_slug($data['name']);
        $data['level'] = $request->input('level', 1);

        $object->update($data);

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
        try
        {
            $afectedRows = \App\Nay\Model\CategoriesModel::destroy($id);        

            return response()->json(['afectedRows' => $afectedRows, 'error' => null]);
        }
        catch (\Illuminate\Database\QueryException $e)
        {

            return response()->json(['afectedRows' => null, 'error' => $e->getCode()]);             
        }
    }


    public function uploadImage(Request $request)
    {
        $c = \App\Nay\Model\CategoriesModel::find($request->input('id'));

        $imageFileName = $c->getImageFileName();

        $path = $request->file('image')->storeAs($c->imagePath, $imageFileName);

        return $path;
    }

    public function tree()
    {
        $categories = \App\Nay\Model\CategoriesModel::all()->toArray();

        $categories = buildTree($categories);

        return view('categories.tree')->with(['categories' => $categories]);
    }
}