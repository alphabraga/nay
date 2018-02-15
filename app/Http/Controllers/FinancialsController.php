<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Laravolt\Avatar\Avatar;

class FinancialsController extends FrontController
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
                                 ['data' => 'action', 'title' => 'Ação', 'orderable' => false, 'searchable' => false]  
                                ]
                ];

       return view('financials.index')->with('grid', $grid);
    }

    public function search()
    {

        return DataTables::of(\App\Nay\Model\FinancialsModel::select('id'))
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
        ->rawColumns(['action'])
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand = new \App\Nay\Model\FinancialsModel();

        $data = ['object' => $brand, 'showMode' => false];

        return view('financials.form')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['tags' => 'required']);

        $data         = $request->all();

        $financial = \App\Nay\Model\FinancialsModel::create($data);

        return redirect('financials/' . $financial->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $object  = \App\Nay\Model\FinancialsModel::find($id);

        if($object === null)
        {
            \Session::flash('flash_message','Não encontramos informação desejada');

            return $this->index();            
        }    

        $data = [
                    'object'  => $object,
                    'showMode'=> true
                ];

        return view('financials.form')->with($data);

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
                    'object'    => \App\Nay\Model\FinancialsModel::find($id),
                    'showMode'  => false
                ];

        return view('financials.form')->with($data);
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
        $object = \App\Nay\Model\FinancialsModel::find($id);

        $data         = $request->all();

        $object->update($data);

        return redirect('financials/' . $object->id);
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
            $afectedRows = \App\Nay\Model\FinancialsModel::destroy($id);

            return response()->json(['afectedRows' => $afectedRows, 'error' => null]);
        }
        catch (\Illuminate\Database\QueryException $e)
        {

            return response()->json(['afectedRows' => null, 'error' => $e->getCode()]);             
        }

    }

}