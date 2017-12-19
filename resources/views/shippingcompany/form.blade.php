@extends('layouts.main')
@section('title', 'Transportadora')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><i class="fa fa-truck fa-fw"></i>Transportadora <small>Cadastro</small></h1>
  <ol class="breadcrumb">
    <li><a href="{{action('ShippingCompanyController@index')}}"><i class="fa fa-truck fa-fw"></i> Transportadora</a></li>
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
          <li class="active"><a href="#tab_1" data-toggle="tab"><i class="fa fa-truck fa-fw"></i>Cadastro</a></a></li>
          <li><a href="#tab_2" data-toggle="tab"><i class="fa fa-image fa-fw"></i>Imagem</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
            @if(is_null($object->id))
            <form id="update" name="update" method="post" action="{{action('ShippingCompanyController@store')}}" >
              <input type="hidden" name="_method" value="POST" />
              @else
              <form id="update" name="update" method="post" action="{{action('ShippingCompanyController@update', [$object->id])}}" >
                <input type="hidden" name="_method" value="PATCH" />
                @endif
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Nome</label><input id="name" type="text" name="name" value="{{$object->name}}" class="form-control input-sm name">
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Slug</label><input id="slug" type="text" name="slug" value="{{$object->slug}}" disabled="disabled" class="form-control input-sm name">
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Descrição</label>
                      <textarea class="form-control input-sm name" name="description" id="description" >
                      {{$object->description}}
                      </textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Tags</label>
                      <select name="tags[]" class="form-control select2-tags" multiple >
                        @if(count($object->tags))
                        @foreach($object->tags as $t)
                        <option value="{{$t}}" selected="selected">{{$t}}</option>
                        @endforeach
                        @endif
                      </select>
                    </div>
                  </div>
                </div>
                @if($showMode == false)
                @include('includes.formbutons')
                @endif
              </form>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_2">
              <p class="bg-danger">Colocar aqui a imagem</p>
            </div>
            <!-- /.tab-pane -->
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div>
        
      </div>
      <!-- /.box-body -->
    </div>
    {{-- @include('includes.timestamp') --}}
    <div id="info-text">
      <p>Colocar aqui a listagem usando o datatables das marcas que esse fornecedor possui</p>
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