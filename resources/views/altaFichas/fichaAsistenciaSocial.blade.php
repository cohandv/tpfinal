@extends('layouts.adminApp')
@extends('scripts.googleMaps')


@section('title')
	Ficha Asistencia Social
@endsection

@section('head')

	<!-- DATATABLES -->
	<link rel="stylesheet" href="{{ asset('/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
	<script src="{{ asset('/datatables.net/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

	<style type="text/css">
		
		.pac-container {

			z-index: 99999;
		}

	</style>

@endsection

@section('pageHeader')
<h1>
	Ficha Asistencia Social
</h1>

@endsection

@section('content')
<div class="row">
    

        <div class="col-md-12">
          <h3 class="box-title"><i class="icon fa fa-legal fa-fw"></i> Ficha Asistencia Social
          <span class="pull-right">
            <button type="button" class="btn btn-default btn-sm no-print"><i class="fa fa-print"></i> Imprimir</button>
            <button type="button" class="btn btn-default btn-sm no-print"><i class="fa fa-share"></i> Compartir</button>
          </span>
          </h3>
        </div>  
    
    
    
      <div class="col-md-10 col-md-offset-1">
        <div class="box-body">
          <div class="box-group">
            <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
            <div class="panel box">
              <div class="box-header with-border">
                <h4 class="box-title">
                  <a data-toggle="collapse" href="#collapseServicio" style="color: black;"> Servicios Sociales </a>
                </h4>
              </div>
              <div id="collapseServicio" class="panel-collapse collapse in">
                <div class="box-body ">
                    
                  @if(($asistido->checkFichaAsistenciaSocial)==1)
                  
                    @foreach($servicios as $servicio)
                      <div class="box-tools pull-right">
                        <a href="{{ route('fichaAsistenciaSocial.destroyServicio',['id'=>$servicio->id,'asistido_id'=>$asistido->id])}}" class="descartarBtn" data-id="{{$servicio->id}}" data-toggle="tooltip" data-title="Descartar Servicio Social">
                            <i class="fa fa-trash"></i>
                        </a>
                      </div>
                      <dl class="dl-horizontal" >
                        @if(isset($servicio->tipo))
                        <dt>Tipo</dt>
                        <dd>{{$servicio->tipo}}</dd>
                        @endif
                        @if(isset($servicio->fecha_inicio))
                        <dt>Desde</dt>
                        <dd>{{$servicio->fecha_inicio}}</dd>
                        @endif
                        @if(isset($servicio->fecha_fin))
                        <dt>Hasta</dt>
                        <dd>{{$servicio->fecha_fin}}</dd>
                        @endif
                        @if(isset($servicio->prestador))
                        <dt>Prestador</dt>
                        <dd>{{$servicio->prestador}}</dd>
                        @endif
                        @if(isset($servicio->direccion))
                        <dt>Dirección</dt>
                        <dd>{{$servicio->direccion}}</dd>
                        @endif
                        @if(isset($servicio->telefono))
                        <dt>Teléfono</dt>
                        <dd>{{$servicio->telefono}}</dd>
                        @endif
                        @if(isset($servicio->referente))
                        <dt>Referente</dt>
                        <dd>{{$servicio->referente}}</dd>
                        @endif
                     
    
                      </dl>
                    @endforeach
                    @endif 
    
                  <a href="#" data-toggle="modal" data-target="#modal-servicios"><i align="left" class="fa fa-plus"></i>  Agregar Antecedente</a>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" id="modal-servicios">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"> Agregar Servicio Social </h4>
                </div>
                  <form id="nuevoContacto-form" method="POST" action="{{ route('fichaAsistenciaSocial.storeServicio',['asistido_id'=>$asistido->id]) }}">
                    {{ csrf_field() }}
                    <div class="box-body">
    
                        <div class="box-body">
                            <div class="form-group">          
                                {!! Form::Label('tipo', 'Tipo Servicio Social') !!}
                                <select class="form-control" name="tipo" id="tipo" required >
                                    <option value="Comedor">Comedor</option>
                                    <option value="Alimentos">Bolsa de alimentos</option>
                                </select>
                            </div>
                        </div>
                        <span>Período en que se utilizó el servicio</span>
                        <div class="form-group col-md-12 {{ $errors->has('fecha_inicio') ? ' has-error' : '' }}">
                            <label for="fecha_inicio">Desde</label>
                            <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" >
                            @if ($errors->has('fecha_inicio'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('fecha_inicio') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group col-md-12 {{ $errors->has('fecha_fin') ? ' has-error' : '' }}">
                            <label for="fecha_fin">Desde</label>
                            <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" >
                            @if ($errors->has('fecha_fin'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('fecha_fin') }}</strong>
                                </span>
                            @endif
                        </div>
    
                        <div class="form-group col-md-12 {{ $errors->has('prestador') ? ' has-error' : '' }}">
                                <label for="prestador">Prestador del servicio</label>
                                <input type="text" class="form-control" id="prestador" placeholder="Ingrese el nombre del prestador del servicio" maxlength="250" name="prestador" >
                            @if ($errors->has('prestador'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('prestador') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-12 {{ $errors->has('direccion') ? ' has-error' : '' }}">
                                <label for="direccion">Dirección</label>
                                <input type="text" class="form-control" id="direccion" placeholder="Ingrese dirección" maxlength="250" name="direccion" >
                            @if ($errors->has('direccion'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('direccion') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-12 {{ $errors->has('telefono') ? ' has-error' : '' }}">
                                <label for="telefono">Teléfono</label>
                                <input type="text" class="form-control" id="telefono" placeholder="Ingrese teléfono" maxlength="15" name="telefono" >
                            @if ($errors->has('telefono'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('telefono') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group col-md-12 {{ $errors->has('referente') ? ' has-error' : '' }}">
                                <label for="referente">Referente</label>
                                <input type="text" class="form-control" id="referente" placeholder="Ingrese referente del servicio" maxlength="200" name="referente" >
                            @if ($errors->has('referente'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('referente') }}</strong>
                                </span>
                            @endif
                        </div>

                        
                    </div>
    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-danger">Agregar </button>
                    </div>
                    </form>
                </div>
                </div>
            </div>
            
            </div>
            
        </div>
    </div>
@endsection