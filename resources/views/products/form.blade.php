@extends('layouts.main')
@section('title', 'Produtos')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><i class="fa fa-cube fa-fw"></i>Produtos <small>Cadastro</small></h1>
  <ol class="breadcrumb">
    <li><a href="{{action('ProductsController@index')}}"><i class="fa fa-cube fa-fw"></i> Produtos</a></li>
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
          <li class="active"><a href="#tab_1" data-toggle="tab"><i class="fa fa-cube fa-fw"></i>Cadastro</a></a></li>
          <li><a href="#tab_2" data-toggle="tab"><i class="fa fa-image fa-fw"></i>Galetria de Imagens</a></li>
          <li><a href="#tab_3" data-toggle="tab"><i class="fa fa-money fa-fw"></i>Vendas Recentes</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
              @if(is_null($object->id))
            <form id="update" name="update" method="post" action="{{action('ProductsController@store')}}" >
              <input type="hidden" name="_method" value="POST" />
              @else
              <form id="update" name="update" method="post" action="{{action('ProductsController@update', [$object->id])}}" >
                <input type="hidden" name="_method" value="PATCH" />
                @endif
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Código De Barras</label><input id="barcode" type="text" name="barcode" value="{{old('barcode', $object->barcode)}}" class="form-control input-sm external_code">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Código</label><input id="code" type="text" name="code" value="{{old('code', $object->code)}}" class="form-control input-sm code">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Código Externo</label><input id="external_code" type="text" name="external_code" value="{{old('external_code', $object->external_code)}}" class="form-control input-sm external_code">
            </div>
          </div>
        </div>
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
              <label>Quantidade Limite</label>
              <input id="quantity_limit" type="text" name="quantity_limit" value="{{old('quantity_limit', $object->quantity_limit)}}" class="form-control input-sm quantity_limit">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Quantidade</label>
              <input id="quantity" type="text" name="quantity" value="{{old('quantity', $object->quantity)}}" class="form-control input-sm quantity">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Preço de Compra</label>
              <input id="purchase_price" type="text" name="purchase_price" value="{{old('purchase_price', $object->purchase_price)}}" class="form-control input-sm price">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Preço de Venda</label>
              <input id="sale_price" type="text" name="sale_price" value="{{old('sale_price', $object->sale_price)}}" class="form-control input-sm price">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>{{$configuracao->custom_field1_label}}</label>
              <input id="sale_price" type="text" name="custom_field1" value="{{old('custom_field1', $object->custom_field1)}}" class="form-control input-sm price">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>{{$configuracao->custom_field2_label}}</label>
              <input id="sale_price" type="text" name="custom_field2" value="{{old('custom_field2', $object->custom_field2)}}" class="form-control input-sm price">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>{{$configuracao->custom_field3_label}}</label>
              <input id="sale_price" type="text" name="custom_field3" value="{{old('custom_field3', $object->custom_field3)}}" class="form-control input-sm price">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>{{$configuracao->custom_field4_label}}</label>
              <input id="sale_price" type="text" name="custom_field4" value="{{old('custom_field4', $object->custom_field4)}}" class="form-control input-sm price">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>{{$configuracao->custom_field5_label}}</label>
              <input id="sale_price" type="text" name="custom_field5" value="{{old('custom_field5', $object->custom_field5)}}" class="form-control input-sm price">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>{{$configuracao->custom_field6_label}}</label>
              <input id="sale_price" type="text" name="custom_field6" value="{{old('custom_field6', $object->custom_field6)}}" class="form-control input-sm price">
            </div>
          </div>
        </div>

          <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Marca</label>
                      <select name="brand_id" class="form-control select2" >
                        @if($brands->count()>0)
                        <option value=""  >Selecione uma Marc</option>
                        @foreach($brands as $b)
                        <option value="{{$b->id}}" @if($object->brand_id == $b->id) selected="selected" @endif  >{{$b->name}}</option>
                        @endforeach
                        @endif
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Categoria</label>
                      <select name="category_id" class="form-control select2" >
                        @if($categories->count()>0)
                        <option value=""  >Selecione uma Categoria</option>
                        @foreach($categories as $c)
                        <option value="{{$c->id}}" @if($object->category_id == $c->id) selected="selected" @endif  >{{$c->name}}</option>
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
            
             <div class="row">
            @if(count($object->images)>0)  
              @foreach($object->images as $image)  
              <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe">
                  <img src="{{URL::to($image)}}" class="img-responsive">
              </div>
              @endforeach
            @else
              <div class="alert alert-info"><i class="fa fa-exclamation fa-fw"  ></i> Não existem imagens para esse produto </div>
            @endif  
             </div> 

            </div>
            <div class="tab-pane" id="tab_3">

            @if($object->salesItens->count() > 0)
                <table class="table table-condensed table-striped">
              <thead>
                <th>#</th>
                <th>STATUS</th>
                <th>CLIENTE</th>
                <th>Forma de Pagamento</th>
                <th>Tipo de Transação</th>
                <th>VENDEDOR</th>
                <th>TOTAL BRUTO</th>
                <th>DESCONTO</th>
                <th>TOTAL LIQUIDO</th>
             </thead>
              <tbody>

                <?php $total = 0; ?>

                @foreach($object->salesItens as $saleItem)

                <?php $s = $saleItem->sale; ?>

                <tr>
                  <td>{{$s->id}}</td>
                  <td>{{$s->status}}</td>
                  <td>{{$s->client->name}}</td>
                  <td>{{__('messages.' . $s->paymentMethodName)}}</td>
                  <td>{{__('messages.' . $s->saleCategoryName)}}</td>
                  <td>{{$s->user->name}}</td>
                  <td>{{number_format($s->total, 2,',', '.')}}</td>
                  <td>{{number_format($s->discount, 2,',', '.')}}</td>
                  <td>{{number_format($s->liquid, 2,',', '.')}}</td>
                </tr>

                <?php $total = $total + $saleItem->price; ?>

                @endforeach
                <tr class="info">
                  <td>#</td>
                  <td colspan="7">Total</td>
                  <td>{{number_format($total, 2, ',', '.')}}</td>
                  </tr>
               </tbody>
              </table>
              @else
                <div class="alert alert-info">
                  <p> <i class="fa fa-exclamation fa-fw"></i> Não existem ainda compras para esse cliente.</p>
                </div>
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
      <p>O cadastro das Produtos no sistema tem como o objetivo o controle de todos os produtos das mesmas que serao cadatrados no sistema.</p>
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