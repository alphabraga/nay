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
                    'numeroClients'         => \App\Nay\Model\EntitiesModel::whereIn('entity_category', [\App\Nay\Model\EntityCategory::Client, \App\Nay\Model\EntityCategory::ClientAndCompany  ])->count(),
                    'numeroProducts'        => \App\Nay\Model\ProductsModel::count(),
                    'numeroCategories'      => \App\Nay\Model\CategoriesModel::count(),
                    'numeroBrands'          => \App\Nay\Model\BrandsModel::count(),
                    'numeroSales'           => \App\Nay\Model\SalesModel::count(),
                    'numeroRequests'        => 0,//\App\Nay\Model\RequestsModel::count(),
                    'numeroUsers'           => \App\User::count(),

                    'numeroProviders'       => \App\Nay\Model\EntitiesModel::whereIn('entity_category', [ \App\Nay\Model\EntityCategory::Company, \App\Nay\Model\EntityCategory::ClientAndCompany  ])->count(),
                    'numeroShippingCompany' => \App\Nay\Model\ShippingCompanyModel::count(),
                    'numeroFinancials'      => \App\Nay\Model\FinancialsModel::count(),
                ];

        return view('home')->with($data);
    }
}
