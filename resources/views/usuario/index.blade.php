@extends('layouts.app')

@section('contentheader_title')
<h1>Lista de Usuario</h1>
@endsection

@section('main-content')

<div class="row">	
</div>

	<div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><a class="btn btn-primary" href="{{ route('usuario.create') }}" role="button"><span class="glyphicon glyphicon-pencil" aria-hidden="true">Agregar</span></a> </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>ID</th>
                  <th>Usuario</th>
                  <th>Correo Electronico</th>
                  <th>Perfil</th>
                  <th></th>
                </tr>
      @foreach($usuarios as $item)
    			 <tbody>
    
      <td>{!!$item->id!!}</td>
      <td>{!!$item->name!!}</td>
      <td>{!!$item->email!!}</td>
      <td>{!!$item->roles->rol!!}</td>
      <td><a class="btn btn-primary btn-xs charset="" " href="{{ route('usuario.edit', $item->id) }}" role="button"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
      <a class="btn btn-danger btn-xs" href="{{ route('usuario.destroy', $item->id) }}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" role="button"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span></a></td> 
    
    </tbody>
    @endforeach
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
   {!! $usuarios->render() !!}         <!-- /.box -->
        </div>
</div>
@endsection