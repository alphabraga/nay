<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Laravolt\Avatar\Avatar;

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
                                 ['data' => 'sale_price', 'title' => 'PREÇO'],
                                 ['data' => 'action', 'title' => 'Ação', 'orderable' => false, 'searchable' => false]  
                                ]
                ];        

        return view('products.index')->with('grid', $grid);
    }

    public function search()
    {

        return DataTables::of(\App\Nay\Model\ProductsModel::select('id', 'name', 'sale_price', 'quantity'))
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

        $data = [
                    'object'     => new \App\Nay\Model\ProductsModel(),
                    'brands'     => \App\Nay\Model\BrandsModel::all(),
                    'categories' => \App\Nay\Model\CategoriesModel::all(),
                    'showMode'   => false
                ];

        return view('products.form')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        (strlen($reuqest->input('id')))? $updateRule = ',' . $request->input('id'):$updateRule = '';

       $rules = [
                    'name'           => 'required|unique:brands,name' . $updateRule,
                    'code'           => 'required|unique:products,code' . $updateRule,
                    'description'    => 'required', 
                    'tags'           => 'required',
                    'purchase_price' => 'required', 
                    'sale_price'     => 'required',
                    'brand_id'       => 'required',
                    'category_id'    => 'required'
                ]; 

       $this->validate($request, $rules);


        $data         = $request->all();
        $data['slug'] = str_slug($request->input('name'));

        $object = \App\Nay\Model\ProductsModel::create($data);

        $viewData = [
                        'object' => $object,
                        'showMode' => false,
                    ];

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
                    'object'     => \App\Nay\Model\ProductsModel::find($id),
                    'images'     => \App\Nay\Model\ProductsModel::find($id)->images,  
                    'brands'     => \App\Nay\Model\BrandsModel::all(),
                    'categories' => \App\Nay\Model\CategoriesModel::all(),
                    'showMode'   => true 
                ];

        return view('products.form')->with($data);
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
                    'object'     => \App\Nay\Model\ProductsModel::find($id),
                    'categories' => \App\Nay\Model\CategoriesModel::all(),
                    'showMode'   => false,
                    'brands'     => \App\Nay\Model\BrandsModel::all()
                ];

        return view('products.form')->with($data);
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

        $request->validate([
                    'name'           =>  \Illuminate\Validation\Rule::unique('products')->ignore($object->id),
                    'code'           =>  \Illuminate\Validation\Rule::unique('products')->ignore($object->id),
                    'barcode'        =>  \Illuminate\Validation\Rule::unique('products')->ignore($object->id),
                    'description'    => 'required', 
                    'tags'           => 'required',
                    'purchase_price' => 'required', 
                    'sale_price'     => 'required',
                    'brand_id'       => 'required',
                    'category_id'    => 'required'
                ]); 

        $data = $request->all();

        $data['slug'] = str_slug($data['name']);

        $object->update($data);

        return redirect('/products/' . $object->id);
    }

    
    public function searchCart(Request $request)
    {


        $term = $request->input('term');

        $products = \App\Nay\Model\ProductsModel::select('id', 'code', 'name', 'sale_price')
                                                  ->where('name', 'like', "%$term%")
                                                  ->orWhere('barcode', '=', $term)
                                                  ->orWhere('code', '=', $term)
                                                  ->take(100)
                                                  ->get();

        $data = [
                    'results' => [],
                    'pagination' =>['more' => true]
                ];

        foreach ($products as $p)
        {
            $data['results'][] = [ 
                                    'id'         => $p->id, 
                                    'text'       => $p->name, 
                                    'sale_price' => $p->sale_price,
                                    'code'       => $p->code
                                ];
        }

        return response()->json($data);
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
            $afectedRows = \App\Nay\Model\ProductsModel::destroy($id);        

            return response()->json(['afectedRows' => $afectedRows, 'error' => null]);
        }
        catch (\Illuminate\Database\QueryException $e)
        {

            return response()->json(['afectedRows' => null, 'error' => $e->getCode()]);             
        }

    }
}
