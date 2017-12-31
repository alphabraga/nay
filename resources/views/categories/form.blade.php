@extends('layouts.main')
@section('title', 'Categorias')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><i class="fa fa-cubes fa-fw"></i>Categorias <small>Cadastro</small></h1>
  <ol class="breadcrumb">
    <li><a href="{{action('CategoriesController@index')}}"><i class="fa fa-cubes fa-fw"></i> Categorias</a></li>
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
          <li class="active"><a href="#tab_1" data-toggle="tab"><i class="fa fa-cubes fa-fw"></i>Cadastro</a></a></li>
          <li><a href="#tab_2" data-toggle="tab"><i class="fa fa-image fa-fw"></i>Imagem</a></li>
          <li><a href="#tab_3" data-toggle="tab"><i class="fa fa-level-up fa-fw"></i>Categoria Mãe</a></li>
          <li><a href="#tab_4" data-toggle="tab"><i class="fa fa-level-down fa-fw"></i>Categoria(s) Filha(s)</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
            @if(is_null($object->id))
            <form id="update" name="update" method="post" action="{{action('CategoriesController@store')}}" >
              <input type="hidden" name="_method" value="POST" />
              @else
              <form id="update" name="update" method="post" action="{{action('CategoriesController@update', [$object->id])}}" >
                <input type="hidden" name="_method" value="PATCH" />
                @endif
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Nome</label><input id="name" type="text" name="name" value="{{old('name', $object->name)}}" class="form-control input-sm name">
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Slug</label><input id="slug" type="text" name="slug" value="{{old('slug', $object->slug)}}" disabled="disabled" class="form-control input-sm name">
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
                        @if(count($object->tags))
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
                      <label>Nível</label>
                      <input id="level" type="text" name="level" value="{{old('level', $object->level)}}" class="form-control input-sm level">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Categoria Mãe</label> <br>
                      <select id="category_id" name="category_id" class="form-control input-sm select2">
                        <option value="">Escolha uma Categoria...</option>
                        @foreach($categories as $c)
                        <option value="{{$c->id}}" @if($object->category_id == $c->id) selected="selected" @endif>{{$c->name}}</option>
                        @endforeach
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

              <div class="tab-pane" id="tab_3">

                  @if(isset($motherCategory))  

                  <table id="data-simple" class="table table-striped table-condensed table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Categoria</th>
                    </tr>
                  </thead>                    
                  <tbody>
                  <tr><td>{{$motherCategory->id}}</td><td>{{$motherCategory->name}}</td> <td><a class="btn btn-info" href="{{action('CategoriesController@show', ['id' => $motherCategory->id])}}">Detalhes</a></td> </tr>
                  </tbody>
                  </table>
                  @else
                  <div class="alert alert-info"><i class="fa fa-exclamation fa-fw"></i> Não existem registros </div>
                  @endif

            </div>

                <div class="tab-pane" id="tab_4">

                  @if(isset($childrenCategories) && $childrenCategories->count()>0)  

                  <table id="data-simple" class="table table-striped table-condensed table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Categoria</th>
                    </tr>
                  </thead>                    
                  <tbody>
                  @foreach($childrenCategories as $c)
                  <tr><td>{{$c->id}}</td><td>{{$c->name}}</td> <td><a class="btn btn-info" href="{{action('CategoriesController@show', ['id' => $c->id])}}">Detalhes</a></td> </tr>
                  @endforeach
                  </tbody>
                  </table>
                  @else
                  <div class="alert alert-info"><i class="fa fa-exclamation fa-fw"></i> Não existem registros </div>
                  @endif

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
      <p>O cadastro das Categorias no sistema.</p>
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