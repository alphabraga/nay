@extends('layouts.main')
@section('title', 'Backup')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><i class="fa fa-hdd-o fa-fw"></i>Administrativo<small>Backup</small></h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-hdd-o fa-fw"></i>Backup</a></li>
    <li class="active">Visualização</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="box">
    <!-- /.box-header -->
    <div class="box-body">
      
      <div id="painel" class="btn-group pull-right" role="group" style="padding:5px">
        <a id="listar" href="/backupList" class="btn btn-info" > <i class="fa fa-list fa-fw"></i>Listar</a>
        <a id="validar"  href="/backupMonitor" class="btn btn-info" > <i class="fa fa-check fa-fw"></i>Validar</a>
        <a id="executar"  href="/backupRun" class="btn btn-info"><span class="fa fa-play fa-fw"></span> Executar</a>
        <a id="limpar"  href="/backupClean" class="btn btn-danger"><span class="fa fa-times fa-fw"></span>Limpar Backups</a>
      </div>

      <div class="row">
      <div class="col-md-12">
      <div class="panel panel-default"> <div class="panel-heading"> <h3 class="panel-title"><i class="fa fa-desktop fa-fw"></i>Mensagens do Sistema de Backups</h3> </div> 
      <div class="panel-body">       
        <pre class="console-output"></pre>
      </div>
  </div> 
</div> 
</div>
<div class="row">
  
<div id="lista-arquivos" class="col-md-12">


<div class="panel panel-primary"> <div class="panel-heading"> <h3 class="panel-title"><i class="fa fa-list fa-fw"></i>Listagem de Backups</h3> </div> 
      <div class="panel-body">       

  <table class="table table-condensed table-striped table-hover">
    <thead>
      <th>Arquivo</th>
      <th>Download</th>
    </thead>
    <tbody>
    </tbody>
  </table>

      </div>
  </div>
  

</div>

</div>
  
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
@section('javascript')
<script type="text/javascript">


  $(document).ajaxStart().ajaxStart(function() {
      $("pre.console-output").addClass('embassado');

  });

  $(document).ajaxComplete(function() {
      $("pre.console-output").removeClass('embassado');
  });

$(document).ready(function()
{

  function showBackups()
  {

    $('div#lista-arquivos table tbody').empty();

    $.getJSON('/showBackups', function(data)
    {
        $.each(data.backups, function(i,e)
        {
          $('div#lista-arquivos table tbody').append('<tr><td>'+e.fileName+'</td><td><a class="btn btn-info btn-small" target="_blank" href="/downloadBackup/'+e.fileName+'"><i class="fa fa-download fa-w"></a></td></tr>');
        });
    });


  }


  $.getJSON('/backupList', function(data)
  {
    $('pre.console-output').html(data.output);

    showBackups();

  });

  $('a#listar').on('click', function(e)
  {
    e.preventDefault();

    $.getJSON($(this).attr('href'), function(data)
    {
      $('pre.console-output').html(data.output);
    });

    showBackups();

  });

  $('a#validar').on('click', function(e)
  {
    e.preventDefault();

    $.getJSON($(this).attr('href'), function(data)
    {
            (data.returnCode == 0)? alertText = '<div class="alert alert-success">Operaçao realizada com sucesso</div>' : alertText = '<div class="alert alert-danger">Erro ao realizar operaçao!</div>';


      bootbox.alert(alertText);
      $('pre.console-output').html(data.output);
    });
  });

  $('a#executar').on('click', function(e)
  {
    e.preventDefault();

    $.getJSON($(this).attr('href'), function(data)
    {
            (data.returnCode == 0)? alertText = '<div class="alert alert-success">Operaçao realizada com sucesso</div>' : alertText = '<div class="alert alert-danger">Erro ao realizar operaçao!</div>';


      bootbox.alert(alertText);
      $('pre.console-output').html(data.output);
    });

    $('a#listar').trigger('click');

  });


  $('a#limpar').on('click', function(e)
  {
    e.preventDefault();

    $.getJSON($(this).attr('href'), function(data)
    {


      (data.returnCode == 0)? alertText = '<div class="alert alert-success">Operaçao realizada com sucesso</div>' : alertText = '<div class="alert alert-danger">Erro ao realizar operaçao!</div>';


      bootbox.alert(alertText);
      $('pre.console-output').html(data.output);
    });
  });


});
</script>
@endsection