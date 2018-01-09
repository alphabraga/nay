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
          <span class="muted">{{$roles->implode(', ')}}</span>
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
            <i class="fa fa-laptop fa-fw"></i> <span>Operações</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{URL::to('/carrinho')}}"><i class="fa fa-cart-o fa-shopping-cart"></i> Nova Venda</a></li>
            <li><a href="{{URL::to('/sales')}}"><i class="fa fa-cart-o fa-shopping-cart"></i> Vendas</a></li>            
            <li><a href="#"><i class="fa fa-archive"></i> Novo Pedido</a></li>
            <li><a href="#"><i class="fa fa-archive"></i> Pedidos</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book fa-fw"></i>
            <span>Cadastro</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{action('ClientsController@index')}}"><i class="fa fa-group fa-fw"></i>Clientes</a></li>
            <li><a href="{{action('BrandsController@index')}}"><i class="fa fa-tags"></i>Marcas</a></li>
            <li><a href="{{action('CategoriesController@index')}}"><i class="fa fa-cubes"></i>Categorias</a></li>
            <li><a href="{{action('ProvidersController@index')}}"><i class="fa fa-industry fa-fw"></i>Fornecedores</a></li>
            <li><a href="{{action('ShippingCompanyController@index')}}"><i class="fa fa-truck fa-fw"></i>Transportadoras</a></li>
            <li><a href="{{action('ProductsController@index')}}"><i class="fa fa-money"></i>Produtos</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cog fa-fw"></i> <span>Administrativo</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{URL::to('/users')}}"><i class="fa fa-user fa-fw"></i>Usuários</a></li>
            <li><a href="{{URL::to('/configuration/1')}}"><i class="fa fa-cogs fa-fw"></i>Configurações</a></li>
            <li><a target="_target" href="{{URL::to('/logs')}}"><i class="fa fa-file-o fa-fw"></i>Logs de Erros</a></li>
            <li><a href="{{URL::to('/backup')}}"><i class="fa fa-hdd-o fa-fw"></i>Backup</a></li>
            <li><a href="{{URL::to('/sobre')}}"><i class="fa fa-comment fa-fw"></i>Sobre</a></li>
            <li><a href="#"><i class="fa fa-play"></i>Ajuda com videos</a></li>
            <li><a href="#"><i class="fa fa-file"></i>Logs</a></li>
          </ul>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>