@extends('layouts.main')
@section('title', 'Sobre')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><i class="fa fa-gears fa-fw"></i>Administrativo<small>Sobre</small></h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dialog fa-fw"></i>Sobre</a></li>
    <li class="active">Visualização</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="box">
    <!-- /.box-header -->
    <div class="box-body">
      <table class="table table-bordered table-striped">
        <tr>
          <td><b>Hostname</b></td><td>{{$hostname}}</td>
        </tr>
        <tr>
          <td><b>Linux</b></td><td>{{$linux}}</td>
        </tr>
        <tr>
          <td><b>Versão do PHP</b></td><td>{{$php}}</td>
        </tr>
        <tr>
          <td><b>Versão do Mysql</b></td><td>{{$database}}</td>
        </tr>
        <tr>
          <td><b>Hora do Servidor</b></td><td>{{$data}}</td>
        </tr>
        <tr>
          <td><b>Time Zone</b></td><td>{{$timezone}}</td>
        </tr>
      </table>
      <!-- /.box-body -->
    </div>
    <div id="info-text">
      <h4>Sobre</h4>
      <small>Visualise informações sobre o ecosistema onde o sistema esta funcionando</small>
      
      <p>Visualise informações sobre o ecosistema onde o sistema esta funcionando</p>
    </div>
  </div>
</section>
<!-- /.content -->
@endsection