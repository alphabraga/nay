@extends('layouts.main')
@section('title', 'Principal')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><i class="fa fa-home fa-fw"></i>Principal <small>página principal do sistema</small></h1>
  <ol class="breadcrumb">
    <li><a href="{{action('HomeController@index')}}"><i class="fa fa-home fa-fw"></i> Principal</a></li>
    <li class="active">Principal</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="box">
    <!-- /.box-header -->
    <div class="box-body">
    
    <div class="row">
        
        <div class="col-md-12">
            
            <div class="nav-tabs-custom" style="cursor: move;">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right ui-sortable-handle">
              <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
              <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>
              <li class="pull-left header"><i class="fa fa-inbox"></i> Vendas</li>
            </ul>
            <div class="tab-content no-padding">
              <!-- Morris chart - Sales -->
              <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg height="300" version="1.1" width="1068.6" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.2.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><text x="51.859375" y="261.671875" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="3.9921875">0</tspan></text><path fill="none" stroke="#aaaaaa" d="M64.359375,261.671875H1043.6" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="51.859375" y="202.50390625" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="3.99609375">7,500</tspan></text><path fill="none" stroke="#aaaaaa" d="M64.359375,202.50390625H1043.6" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="51.859375" y="143.3359375" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4">15,000</tspan></text><path fill="none" stroke="#aaaaaa" d="M64.359375,143.3359375H1043.6" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="51.859375" y="84.16796875" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.00390625">22,500</tspan></text><path fill="none" stroke="#aaaaaa" d="M64.359375,84.16796875H1043.6" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="51.859375" y="25" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="3.9921875">30,000</tspan></text><path fill="none" stroke="#aaaaaa" d="M64.359375,25H1043.6" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="1043.6" y="274.171875" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.6641)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="3.9921875">2013-06</tspan></text><text x="971.0195891555285" y="274.171875" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.6641)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="3.9921875">2013-04</tspan></text><text x="863.9337370899149" y="274.171875" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.6641)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="3.9921875">2013-01</tspan></text><text x="791.3533262454434" y="274.171875" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.6641)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="3.9921875">2012-11</tspan></text><text x="718.772915400972" y="274.171875" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.6641)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="3.9921875">2012-09</tspan></text><text x="645.0026617557716" y="274.171875" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.6641)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="3.9921875">2012-07</tspan></text><text x="572.4222509113001" y="274.171875" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.6641)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="3.9921875">2012-05</tspan></text><text x="499.84184006682864" y="274.171875" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.6641)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="3.9921875">2012-03</tspan></text><text x="428.45127202308623" y="274.171875" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.6641)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="3.9921875">2012-01</tspan></text><text x="355.8708611786148" y="274.171875" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.6641)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="3.9921875">2011-11</tspan></text><text x="283.2904503341434" y="274.171875" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.6641)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="3.9921875">2011-09</tspan></text><text x="209.5201966889429" y="274.171875" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.6641)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="3.9921875">2011-07</tspan></text><text x="136.93978584447143" y="274.171875" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.6641)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="3.9921875">2011-05</tspan></text><text x="64.359375" y="274.171875" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.6641)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="3.9921875">2011-03</tspan></text><path fill="#74a5c2" stroke="none" d="M64.359375,219.60739375C91.72575941676791,220.1201828125,146.45852825030377,223.1860697265625,173.8249126670717,221.65855C201.1912970838396,220.1310302734375,255.92406591737546,209.6598032530738,283.2904503341434,207.3872359375C310.359374050729,205.13937044057377,364.4972214839004,205.3942615234375,391.566145200486,203.57681875C418.63506891707164,201.7593759765625,472.772916350243,195.39664768826847,499.84184006682864,192.84769375000002C527.2082244835966,190.27072932889345,581.9409933171324,182.9656568359375,609.3073777339004,183.0731453125C636.6737621506683,183.1806337890625,691.4065309842041,204.69068539959017,718.772915400972,193.7076015625C745.8418391175577,182.84389907146516,799.979686550729,102.16300748446133,827.0486102673146,95.686C853.8200732837181,89.28016842196133,907.3629993165248,135.4515780949519,934.1344623329283,142.1762453125C961.5008467496962,149.0503495793269,1016.233615583232,148.10487578125,1043.6,150.0810859375L1043.6,261.671875L64.359375,261.671875Z" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></path><path fill="none" stroke="#3c8dbc" d="M64.359375,219.60739375C91.72575941676791,220.1201828125,146.45852825030377,223.1860697265625,173.8249126670717,221.65855C201.1912970838396,220.1310302734375,255.92406591737546,209.6598032530738,283.2904503341434,207.3872359375C310.359374050729,205.13937044057377,364.4972214839004,205.3942615234375,391.566145200486,203.57681875C418.63506891707164,201.7593759765625,472.772916350243,195.39664768826847,499.84184006682864,192.84769375000002C527.2082244835966,190.27072932889345,581.9409933171324,182.9656568359375,609.3073777339004,183.0731453125C636.6737621506683,183.1806337890625,691.4065309842041,204.69068539959017,718.772915400972,193.7076015625C745.8418391175577,182.84389907146516,799.979686550729,102.16300748446133,827.0486102673146,95.686C853.8200732837181,89.28016842196133,907.3629993165248,135.4515780949519,934.1344623329283,142.1762453125C961.5008467496962,149.0503495793269,1016.233615583232,148.10487578125,1043.6,150.0810859375" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="64.359375" cy="219.60739375" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="173.8249126670717" cy="221.65855" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="283.2904503341434" cy="207.3872359375" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="391.566145200486" cy="203.57681875" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="499.84184006682864" cy="192.84769375000002" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="609.3073777339004" cy="183.0731453125" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="718.772915400972" cy="193.7076015625" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="827.0486102673146" cy="95.686" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="934.1344623329283" cy="142.1762453125" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="1043.6" cy="150.0810859375" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><path fill="#eaf3f6" stroke="none" d="M64.359375,240.639634375C91.72575941676791,240.41874062500003,146.45852825030377,241.970913671875,173.8249126670717,239.756059375C201.1912970838396,237.54120507812502,255.92406591737546,223.9014147797131,283.2904503341434,222.92079999999999C310.359374050729,221.9508440765881,364.4972214839004,233.825456640625,391.566145200486,231.9537765625C418.63506891707164,230.082096484375,472.772916350243,209.81371541367827,499.84184006682864,207.947359375C527.2082244835966,206.06049392930328,581.9409933171324,214.978486328125,609.3073777339004,216.940890625C636.6737621506683,218.90329492187502,691.4065309842041,232.96987056864754,718.772915400972,223.64659375C745.8418391175577,214.42465689677255,799.979686550729,148.5776420170062,827.0486102673146,142.7600359375C853.8200732837181,137.00635959513122,907.3629993165248,170.88452207675135,934.1344623329283,177.36146406249998C961.5008467496962,183.98233809237635,1016.233615583232,190.703841015625,1043.6,195.1513L1043.6,261.671875L64.359375,261.671875Z" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></path><path fill="none" stroke="#a0d0e0" d="M64.359375,240.639634375C91.72575941676791,240.41874062500003,146.45852825030377,241.970913671875,173.8249126670717,239.756059375C201.1912970838396,237.54120507812502,255.92406591737546,223.9014147797131,283.2904503341434,222.92079999999999C310.359374050729,221.9508440765881,364.4972214839004,233.825456640625,391.566145200486,231.9537765625C418.63506891707164,230.082096484375,472.772916350243,209.81371541367827,499.84184006682864,207.947359375C527.2082244835966,206.06049392930328,581.9409933171324,214.978486328125,609.3073777339004,216.940890625C636.6737621506683,218.90329492187502,691.4065309842041,232.96987056864754,718.772915400972,223.64659375C745.8418391175577,214.42465689677255,799.979686550729,148.5776420170062,827.0486102673146,142.7600359375C853.8200732837181,137.00635959513122,907.3629993165248,170.88452207675135,934.1344623329283,177.36146406249998C961.5008467496962,183.98233809237635,1016.233615583232,190.703841015625,1043.6,195.1513" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="64.359375" cy="240.639634375" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="173.8249126670717" cy="239.756059375" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="283.2904503341434" cy="222.92079999999999" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="391.566145200486" cy="231.9537765625" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="499.84184006682864" cy="207.947359375" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="609.3073777339004" cy="216.940890625" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="718.772915400972" cy="223.64659375" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="827.0486102673146" cy="142.7600359375" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="934.1344623329283" cy="177.36146406249998" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="1043.6" cy="195.1513" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle></svg><div class="morris-hover morris-default-style" style="left: 21.3385px; top: 158px; display: none;"><div class="morris-hover-row-label">2011 Q1</div><div class="morris-hover-point" style="color: #a0d0e0">
  Item 1:
  2,666
</div><div class="morris-hover-point" style="color: #3c8dbc">
  Item 2:
  2,666
</div></div></div>
              <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"><svg height="300" version="1.1" width="1298.6" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.2.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><path fill="none" stroke="#3c8dbc" d="M549.3,243.33333333333331A93.33333333333333,93.33333333333333,0,0,0,637.527755194977,180.44625304313007" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#3c8dbc" stroke="#ffffff" d="M549.3,246.33333333333331A96.33333333333333,96.33333333333333,0,0,0,640.3636473262442,181.4248826052307L676.9151459070204,194.03833029452744A135,135,0,0,1,549.3,285Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#f56954" d="M637.527755194977,180.44625304313007A93.33333333333333,93.33333333333333,0,0,0,465.5848462783141,108.73398312817662" stroke-width="2" opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 1;"></path><path fill="#f56954" stroke="#ffffff" d="M640.3636473262442,181.4248826052307A96.33333333333333,96.33333333333333,0,0,0,462.8940020515456,107.40757544301087L423.7272694174711,88.10097469226493A140,140,0,0,1,681.6416327924655,195.6693795646951Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#00a65a" d="M465.5848462783141,108.73398312817662A93.33333333333333,93.33333333333333,0,0,0,549.2706784690488,243.333328727518" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#00a65a" stroke="#ffffff" d="M462.8940020515456,107.40757544301087A96.33333333333333,96.33333333333333,0,0,0,549.2697359912682,246.3333285794739L549.2575884998741,284.9999933380171A135,135,0,0,1,428.21200979541857,90.31165416754118Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="549.3" y="140" text-anchor="middle" font-family="&quot;Arial&quot;" font-size="15px" stroke="none" fill="#000000" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: Arial; font-size: 15px; font-weight: 800;" font-weight="800" transform="matrix(1,0,0,1,0,0)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="140">In-Store Sales</tspan></text><text x="549.3" y="160" text-anchor="middle" font-family="&quot;Arial&quot;" font-size="14px" stroke="none" fill="#000000" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: Arial; font-size: 14px;" transform="matrix(1,0,0,1,0,0)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="160">30</tspan></text></svg></div>
            </div>
          </div>



        </div>



    </div>

    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Messages</span>
              <span class="info-box-number">1,410</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Bookmarks</span>
              <span class="info-box-number">410</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Uploads</span>
              <span class="info-box-number">13,648</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Likes</span>
              <span class="info-box-number">93,139</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>

      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Bookmarks</span>
              <span class="info-box-number">41,410</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    70% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Likes</span>
              <span class="info-box-number">41,410</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    70% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fa fa-calendar"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Events</span>
              <span class="info-box-number">41,410</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    70% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="fa fa-comments-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Comments</span>
              <span class="info-box-number">41,410</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    70% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      
<div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>150</h3>

              <p>New Orders</p>
            </div>
            <div class="icon">
              <i class="fa fa-shopping-cart"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>

              <p>Bounce Rate</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>44</h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
      </div>

    </div>
    <!-- /.box-body -->
  </div>
  {{-- @include('includes.timestamp') --}}
  <div id="info-text">
    <p>Essa ´e a página inicial do sistema</p>
  </div>
</section>
<!-- /.content -->
@endsection