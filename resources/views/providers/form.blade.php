@extends('layouts.main')
@section('title', 'Fornecedores')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><i class="fa fa-industry fa-fw"></i>Fornecedores <small>Cadastro</small></h1>
  <ol class="breadcrumb">
    <li><a href="{{action('ProvidersController@index')}}"><i class="fa fa-industry fa-fw"></i> Fornecedores</a></li>
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
          <li class="active"><a href="#tab_1" data-toggle="tab"><i class="fa fa-industry fa-fw"></i>Cadastro</a></a></li>
          <li><a href="#tab_2" data-toggle="tab"><i class="fa fa-tags fa-fw"></i>Marcas do Fornecedor</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
            @if(is_null($object->id))
            <form id="update" name="update" method="post" action="{{action('ProvidersController@store')}}" >
              <input type="hidden" name="_method" value="POST" />
              @else
              <form id="update" name="update" method="post" action="{{action('ProvidersController@update', [$object->id])}}" >
                <input type="hidden" name="_method" value="PATCH" />
                @endif
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group"> {{--old('barcode', $object->barcode)--}}
                      <label>Nome</label><input id="name" type="text" name="name" value="{{old('name', $object->name)}}" class="form-control input-sm name">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Cor</label><input id="color"  required="required" type="color" name="color" value="{{old('color' , $object->color)}}" class="form-control input-sm color">
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
                      <label>Contato</label>
                      <input id="personal_contact" type="text" name="personal_contact" value="{{old('personal_contact', $object->personal_contact)}}" class="form-control input-sm personal_contact">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>CEP</label>
                      <input id="postal_code" type="text" name="postal_code" value="{{old('postal_code', $object->postal_code)}}" class="form-control input-sm postal_code">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Endereço</label>
                      <input id="address" type="text" name="address" value="{{old('address', $object->address)}}" class="form-control input-sm address">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Numero</label>
                      <input id="address_number" type="text" name="address_number" value="{{old('address_number', $object->address_number)}}" class="form-control input-sm address_number">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Complemento</label>
                      <input id="address_complement" type="text" name="address_complement" value="{{old('address_complement', $object->address_complement)}}" class="form-control input-sm address_complement">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Fone</label>
                      <input id="phone" type="text" name="phone" value="{{old('phone', $object->phone)}}" class="form-control input-sm phone">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Celular</label>
                      <input id="cellphone" type="text" name="cellphone" value="{{old('cellphone', $object->cellphone)}}" class="form-control input-sm cellphone">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Email</label>
                      <input id="email" type="text" name="email" value="{{old('email', $object->email)}}" class="form-control input-sm email">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Site</label>
                      <input id="site" type="text" name="site" value="{{old('site', $object->site)}}" class="form-control input-sm site">
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

                @if(isset($object->brands))  

                  <table id="data-simple" class="table table-striped table-condensed table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Marca</th>
                    </tr>
                  </thead>                    
                  <tbody>
                  @foreach($object->brands as $b)  
                  <tr><td>{{$b->id}}</td><td>{{$b->name}}</td> <td><a class="btn btn-info" href="{{action('BrandsController@show', ['id' => $b->id])}}">Detalhes</a></td> </tr>
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