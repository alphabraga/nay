@extends('layouts.main')
@section('title', 'Transaçoes')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1><i class="fa fa-shopping-cart fa-fw"></i>Transaçoes <small>Listagem</small></h1>
    <ol class="breadcrumb">
      <li><a href="{{action('SalesController@index')}}"><i class="fa fa-shopping-cart fa-fw"></i>Transacoes</a></li>
      <li class="active">Listagem</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="box">
      <!-- /.box-header -->
      <div class="box-body">

        @include('includes.menu-basico')
        <div class="ui-datatable ui-widget">
          @include('grid.comon')
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <div id="info-text">
	  <p>Veja aqui todas as transaç~eos que voc^e cadastrou no sistema</p>
    </div>
  </section>
  <!-- /.content -->
@endsection
