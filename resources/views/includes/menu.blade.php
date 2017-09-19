 <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
           <img src="/{{$usuario->getPhoto()}}" class="img-circle" alt="{{$usuario->name}}">
        </div>
        <div class="pull-left info">
          <p>{{$usuario->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Busca...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MENU PRICIPAL</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Painel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Vendas</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Pedidos</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Cadastro</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{action('BrandsController@index')}}"><i class="fa fa-circle-o"></i>Marcas</a></li>
            <li><a href="{{action('CategoriesController@index')}}"><i class="fa fa-circle-o"></i>Categorias</a></li>
            <li><a href="{{action('ProvidersController@index')}}"><i class="fa fa-circle-o"></i>Fornecedores</a></li>
            <li><a href="{{action('ShippingCompanyController@index')}}"><i class="fa fa-circle-o"></i>Transportadoras</a></li>
            <li><a href="{{action('ProductsController@index')}}"><i class="fa fa-circle-o"></i>Produtos</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Operações</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Venda</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Pedido</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Administrativo</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{URL::to('/configuration/1')}}"><i class="fa fa-cogs fa-fw"></i>Configurações</a></li>
            <li><a href="{{URL::to('/sobre')}}"><i class="fa fa-comment fa-fw"></i>Sobre</a></li>
            <li><a href="#"><i class="fa fa-play"></i>Ajuda com videos</a></li>
            <li><a href="#"><i class="fa fa-file"></i>Logs</a></li>
          </ul>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>