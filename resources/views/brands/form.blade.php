@extends('layouts.main')
@section('title', 'Marcas')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><i class="fa fa-tags  fa-fw"></i>Marcas <small>Cadastro</small></h1>
  <ol class="breadcrumb">
    <li><a href="{{action('BrandsController@index')}}"><i class="fa fa-tags  fa-fw"></i> Marcas</a></li>
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
          <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true"><i class="fa fa-tags fa-fw"></i> Cadastro</a></li>
          <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false"><i class="fa fa-image fa-fw"></i>Imagem</a></li>
          <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false"><i class="fa fa-industry fa-fw"></i>Fornecedor</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
            
            @if(is_null($object->id))
            <form id="update" name="update" method="post" action="{{action('BrandsController@store')}}" >
              <input type="hidden" name="_method" value="POST" />
              @else
              <form id="update" name="update" method="post" action="{{action('BrandsController@update', [$object->id])}}" >
                <input type="hidden" name="_method" value="PATCH" />
                @endif
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Nome</label><input id="name" type="text" name="name" value="{{old('name' , $object->name)}}" class="form-control input-sm name">
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Slug</label><input id="slug" type="text" name="slug" value="{{old('slug',$object->slug)}}" disabled="disabled" class="form-control input-sm name">
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Descrição</label>
                      <textarea class="form-control input-sm name" name="description" id="description" >
                      {{old('description', $object->description)}}
                      </textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Tags</label>
                      <select name="tags[]" class="form-control select2-tags" multiple >
                        @if(count($object->tags)>0)
                        @foreach($object->tags as $t)
                        <option value="{{$t}}" selected="selected">{{$t}}</option>
                        @endforeach
                        @endif
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Fonecedor</label>
                      <select name="provider_id" class="form-control select2" >
                        @if($providers->count()>0)
                        @foreach($providers as $p)
                        <option value="{{$p->id}}" @if($object->provider_id == $p->id) selected="selected" @endif  >{{$p->name}}</option>
                        @endforeach
                        @endif
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                <p class="bg-danger">Aqui vai ficar o form de upload de imagem e a imagem</p>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                <p class="bg-danger">dados do fornecedor dessa marca</p>
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