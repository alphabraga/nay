<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Controllers\FrontController;

class HomeController extends FrontController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
       parent::__construct();
    }

    public function index()
    {

        $data = [
                    'numeroClients'    => \App\Nay\Model\ClientsModel::count(),
                    'numeroProducts'   => \App\Nay\Model\ProductsModel::count(),
                    'numeroCategories' => \App\Nay\Model\CategoriesModel::count(),
                    'numeroBrands'     => \App\Nay\Model\BrandsModel::count(),
                    'numeroSales'      => \App\Nay\Model\SalesModel::count(),
                    'numeroRequests'   => 145,
                    'numeroUsers'     => \App\User::count(),
                ];

        return view('home')->with($data);
    }
}
