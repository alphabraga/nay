<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Laravolt\Avatar\Avatar;

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
                                 ['data' => 'provider', 'title' => 'FORNECEDOR'],
                                 ['data' => 'color', 'title' => 'COR'],
                                 ['data' => 'action', 'title' => 'Ação', 'orderable' => false, 'searchable' => false]  
                                ]
                ];

       return view('brands.index')->with('grid', $grid);
    }

    public function search()
    {

        $brands =  \DB::select('select 
                                b.id, 
                                b.name,
                                b.color,
                                p.name provider
                                from brands b
                                left join entities p on p.id = b.entity_id
                                where b.deleted_at is null');


        return DataTables::of(collect($brands))
        ->setRowId('id')
        ->addColumn('color', function($object)
        {
            return '<div style="color: ' . $object->color . '; background-color:' . $object->color . '">' . $object->color . '</div>';

        })
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
        $brand = new \App\Nay\Model\BrandsModel();

        $providers = \App\Nay\Model\EntitiesModel::whereIn('entity_category', 
                                                                            [
                                                                             \App\Nay\Model\EntityCategory::Company,
                                                                             \App\Nay\Model\EntityCategory::ClientAndCompany
                                                                            ]
                                                                         )->get();

        $data = [
                    'object' => $brand, 
                    'showMode' => false, 
                    'providers' => $providers
                ];

        return view('brands.form')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request, [ 'name' => 'required|unique:brands,name', 'description' => 'required', 'tags' => 'required', 'color' => 'required|unique:brands,color']);

       $data         = $request->all();

       $data['slug'] =  str_slug($data['name']);

       $brand = \App\Nay\Model\BrandsModel::create($data);

        $avatar = new Avatar();
        $avatar->create($brand->name)->save(public_path('images/brands/' . $brand->id . '.png'));

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
                    'object'    => $object,
                    'showMode'  => true,
                    'providers' => \App\Nay\Model\EntitiesModel::whereIn('entity_category', 
                                                                            [
                                                                             \App\Nay\Model\EntityCategory::Company,
                                                                             \App\Nay\Model\EntityCategory::ClientAndCompany
                                                                            ]
                                                                         )->get()

                ];

        return view('brands.form')->with($data);

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
                    'object'    => \App\Nay\Model\BrandsModel::find($id),
                    'providers' => \App\Nay\Model\EntitiesModel::whereIn('entity_category', 
                                                                            [
                                                                             \App\Nay\Model\EntityCategory::Company,
                                                                             \App\Nay\Model\EntityCategory::ClientAndCompany
                                                                            ]
                                                                         )->get(),
                    'showMode'  => false
                ];

        return view('brands.form')->with($data);
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

        $data         = $request->all();
        $data['slug'] = str_slug($data['name']);

        $object->update($data);

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

        try
        {
            $afectedRows = \App\Nay\Model\BrandsModel::destroy($id);

            return response()->json(['afectedRows' => $afectedRows, 'error' => null]);
        }
        catch (\Illuminate\Database\QueryException $e)
        {

            return response()->json(['afectedRows' => null, 'error' => $e->getCode()]);             
        }

    }

}