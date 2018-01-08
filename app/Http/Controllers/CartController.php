<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

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
        $clients = \App\Nay\Model\ClientsModel::all();
        $users   = \App\User::all();

        $data = [
                    'object'           => new \App\Nay\Model\SalesModel(),
                    'clients'        => $clients,
                    'users'          => $users,
                    'paymentMethods' => \App\Nay\Model\PaymentMethod::getAll(), 
                    'saleCategories' => \App\Nay\Model\SaleCategory::getAll(), 
                ];

        return view('cart.index')->with($data);
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

    public function checkout(Request $request)
    {
       $this->validate($request, [ 
                                    'client_id'        => 'required', 
                                    'payment_method'   => 'required', 
                                    'salesman_id'      => 'required', 
                                    'transction_method'=> 'required'
                                ]);


        $checkoutData = $request->all();

        $checkoutData['deleted_by']          = '0';
        $checkoutData['status']              = '0';
        $checkoutData['shipping_company_id'] = '1';

        $sale = \App\Nay\Model\SalesModel::create($checkoutData);

        $shoppingItens =  \Cart::getContent();

        foreach ($shoppingItens as $i)
        {
            $itens[] = \App\Nay\Model\SalesItensModel::create([
                                                                'sale_id'   => $sale->id,
                                                                'state'     => '0',
                                                                'quantity'  => $i->quantity,
                                                                'price'     => $i->price,
                                                                'product_id'=> $i->id 
                                                              ]);
        }

        $s = \App\Nay\Model\SalesModel::find($sale->id);

        $response = [
                        'sale'    => $s, 
                        'itens'   => $s->itens,
                        'client'  => $s->client,
                        'salesman'=> $s->salesman
                    ];

        return response()->json($response);
    }
}