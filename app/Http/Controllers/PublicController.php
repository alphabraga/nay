<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PublicController extends Controller
{

    public function publicConfigurations()
    {
        return response()->json(\App\Nay\Model\ConfigurationsModel::getPublic());
    }
}