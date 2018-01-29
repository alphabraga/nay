<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Laravolt\Avatar\Avatar;

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
                                 ['data' => 'color', 'title' => 'COR'],
                                 ['data' => 'action', 'title' => 'Ação', 'orderable' => false, 'searchable' => false]  
                                ]
                ];        

        return view('shippingcompany.index')->with('grid', $grid);

    }

    public function search()
    {

        return DataTables::of(\App\Nay\Model\ShippingCompanyModel::select('id', 'name', 'color'))
        ->setRowId('id')
        ->addColumn('color', function($object)
        {
            return '<div style="color: ' . $object->color . '; background-color:' . $object->color . '">' . $object->color . '</div>';

        })
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
        $data =  [ 
                    'object' => new \App\Nay\Model\ShippingCompanyModel(),
                    'showMode' =>false,
        ];

        return view('shippingcompany.form')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->all();
        $data['slug'] = str_slug($request->input('name'));

        $object = \App\Nay\Model\ShippingCompanyModel::create($data);
        $avatar = new Avatar();
        $avatar->create($object->name)->save(public_path('images/providers/' . $object->id . '.png'));

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

        return view('shippingcompany.form')->with($data);
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


        return view('shippingcompany.form')->with($data);
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

        $data = $request->all();
        $data['slug'] = str_slug($request->input('name'));

        $object->update($data);

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

        try
        {
            $afectedRows = \App\Nay\Model\ShippingCompanyModel::destroy($id);        

            return response()->json(['afectedRows' => $afectedRows, 'error' => null]);
        }
        catch (\Illuminate\Database\QueryException $e)
        {

            return response()->json(['afectedRows' => null, 'error' => $e->getCode()]);             
        }

    }
}
