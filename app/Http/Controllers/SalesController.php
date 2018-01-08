<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SalesController extends FrontController
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
                                 ['data' => 'client.name', 'title' => 'CLIENTE'],
                                 ['data' => 'salesman.name', 'title' => 'ATENDENTE'],
                                 ['data' => 'action', 'title' => 'Ação', 'orderable' => false, 'searchable' => false]  
                                ]
                ];

       return view('sales.index')->with('grid', $grid);
    }

    public function search()
    {

        return DataTables::of(\App\Nay\Model\SalesModel::with('client')->with('salesman')->get())
        ->setRowId('id')
        ->addColumn('action', function($object)
        {
            return '<div id="table-painel" class="btn-group">
                <a href="' . \URL::to("sales/" . $object->id . "/edit") . '" title="" data-id="' . $object->id . '" class="btn btn-primary btn-xs tooltipBtn edit" data-original-title="Alterar"   title="Editar"  data-toggle="tooltip" data-placement="top">
                    <i class="fa fa-pencil"></i>
                </a>
              <a href="' . \URL::to("sales/" . $object->id) . '" title="" data-id="' . $object->id . '" data-token="' . csrf_token() . '" class="btn btn-danger btn-xs tooltipBtn delete-link" data-original-title="Excluir"   title="Excluir"  data-toggle="tooltip" data-placement="top">
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $object  = \App\Nay\Model\SalesModel::find($id);

        if($object === null)
        {
            \Session::flash('flash_message','Não encontramos informação desejada');

            return $this->index();            
        }    

        return view('sales.show')->with(['object' => $object]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $object = \App\Nay\Model\SalesModel::find($id);

        \Cart::clear();

        foreach ($object->itens as $item)
        {
            \Cart::add([
                            'id'       => $item->id,
                            'name'     => $item->name,
                            'price'    => $item->price,
                            'quantity' => $item->quantity
                        ]);
        }

       $request->session()->put('sale', $object); 

       return redirect('carrinho');

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
        $object       = \App\Nay\Model\SalesModel::find($id);
        $data         = $request->all();

        $object->update($data);

        return redirect('sales/' . $object->id);
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
            $afectedRows = \App\Nay\Model\SalesModel::destroy($id);

            return response()->json(['afectedRows' => $afectedRows, 'error' => null]);
        }
        catch (\Illuminate\Database\QueryException $e)
        {

            return response()->json(['afectedRows' => null, 'error' => $e->getCode()]);             
        }

    }

}