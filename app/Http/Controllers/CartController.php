<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends FrontController
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
        //$shoppingItens =  \Cart::getContent();
        //return response()->json($shoppingItens);

        return view('cart.index');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Para pegar todos os itens do carrinho
        //$.get('/carrinho', function(data){ console.log(data) });

        //Para adicionar um item no carrinho
        //$.ajax({
        //  type: "POST",
        //  url: "/carrinho",
        //   data: {product : {id:1223233223, name:'Alfredo Braga', price:100, quantity: 1, atributes:[] }}
        //});

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = $request->input('product');

        \Cart::add($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*$shoppingItens =  \Cart::getContent();

        $itens = array();

        foreach($shoppingItens as $key=>$value){

            $itens[] = $value;
        }

        $data = [
                    'draw'           => 1,
                    'recordsTotal'   => count($shoppingItens),
                    'recordsFiltered'=> count($shoppingItens),
                    'data'           => $itens,
                    'start'          => 0,
                    'length'         => 10,  
                ];

        return response()->json($data);*/

        $shoppingItens =  \Cart::getContent();

        return response()->json($shoppingItens);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return 'edit';
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
        $product = $request->input('product');

        \Cart::update($id, $product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \Cart::remove($id);
    }

    public function isempty()
    {
        $isEmpty =  \Cart::isEmpty();

        return response()->json($isEmpty);
    }

    public function totalquantity(){

        $quantity = \Cart::getTotalQuantity();

        return response()->json($quantity);
    }

    public function subtotal(){

        $subtotal = \Cart::getSubTotal();

        return response()->json($subtotal);
    }


    public function total(){

        $total =  \Cart::getTotal();

        return response()->json($total);
    }


    public function clear()
    {
       \Cart::clear();
    }


}