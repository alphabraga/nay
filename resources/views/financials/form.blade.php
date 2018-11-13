@extends('layouts.main')
@section('title', 'Financeiro')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><i class="fa fa-money  fa-fw"></i>Financeiro <small>Cadastro</small></h1>
  <ol class="breadcrumb">
    <li><a href="{{action('FinancialsController@index')}}"><i class="fa fa-money fa-fw"></i> Financeiro</a></li>
    <li class="active">Cadastro</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="box">
    <!-- /.box-header -->
    <div class="box-body">
      
      @include('includes.painel')
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true"><i class="fa fa-money fa-fw"></i> Dados Gerais</a></li>
          <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false"><i class="fa fa-download fa-fw"></i> Pagamento(s)</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
            
            @if(is_null($object->id))
            <form id="update" name="update" method="post" action="{{action('FinancialsController@store')}}" >
              <input type="hidden" name="_method" value="POST" />
              @else
              <form id="update" name="update" method="post" action="{{action('FinancialsController@update', [$object->id])}}" >
                <input type="hidden" name="_method" value="PATCH" />
                @endif
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Entidade</label><input id="name" type="text" name="name" value="{{old('name' , $object->entity->name)}}" class="form-control input-sm name">
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Valor</label><input id="color" required="required" type="color" name="color" value="{{old('color' , $object->value)}}" class="form-control input-sm color">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Tags</label>
                      <select name="tags[]" class="form-control select2-tags" multiple >
                        @if(is_array($object->tags) && count($object->tags)>0)
                        @foreach($object->tags as $t)
                        <option value="{{$t}}" selected="selected">{{$t}}</option>
                        @endforeach
                        @endif
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                


                    @if(isset($object->provider))  

                  <table id="data-simple" class="table table-striped table-condensed table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Baixas Financeiras</th>
                    </tr>
                  </thead>                    
                  <tbody>
                  <tr><td>{{$object->provider->id}}</td><td>{{$object->provider->name}}</td> <td><a class="btn btn-info" href="{{action('ProvidersController@show', ['id' => $object->provider->id])}}">Detalhes</a></td> </tr>
                  </tbody>
                  </table>
                  @else
                  <div class="alert alert-info"><i class="fa fa-exclamation fa-fw"></i> Não existem registros </div>
                  @endif


              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          @if($showMode == false)
            @include('includes.formbutons')
          @endif
        </form>
        
      </div>
      <!-- /.box-body -->
    </div>
    {{-- @include('includes.timestamp') --}}
    <div id="info-text">
      <p>O cadastro das Categorias no sistema tem como o objetivo o controle de todos os funcionÃ¡rias das mesmas que serÃ£o cadatrados no sistema.</p>
    </div>
  </section>
  <!-- /.content -->
  @endsection
  @if(isset($showMode) && $showMode == true)
  @section('javascript')
  <script type="text/javascript">
  disableForm('update');
  </script>
  @endsection
  @endif