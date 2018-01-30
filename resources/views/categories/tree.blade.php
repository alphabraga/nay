@extends('layouts.main')
@section('title', 'Categorias')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><i class="fa fa-cubes fa-fw"></i>Categorias <small>Atualização</small></h1>
  <ol class="breadcrumb">
    <li><a href="{{action('BrandsController@index')}}"><i class="fa fa-cubes fa-fw"></i> Categorias</a></li>
    <li class="active">Atualização</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="box">
    <!-- /.box-header -->
    <div class="box-body">

      <pre>
        {{print_r($categories)}}
      </pre>  

    </div>
    <!-- /.box-body -->
  </div>
  <div id="info-text">
    <p>O cadastro das Categorias no sistema tem como o objetivo o controle de todos os funcionarios das mesmas que serÃ£o cadatrados no sistema.</p>
  </div>
</section>
<!-- /.content -->
@endsection