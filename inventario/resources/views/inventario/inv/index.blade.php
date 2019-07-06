@extends ('admin.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de ventas</h3>
			@include('inventario.inv.search')
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id Inventario</th>
						<th>Producto</th>
						<th>Cantidad</th>
						<th>Lote</th>
						<th>Fecha de Vencimiento</th>
						<th>Opciones</th>
					</thead>
					@foreach($inventario as $inv)
					<tr>
						<td>{{$inv->idInventario}}</td>
						<td>{{$inv->nombreProducto}}</td>
						<td>{{$inv->cantidadInventario}}</td>
						<td>{{$inv->loteInventario}}</td>
						<td>{{$inv->fechaVencimientoInventario}}</td>
						<td>
							<a href="{{URL::action('InventarioController@edit',$inv->idInventario)}}"><button class="btn btn-info">Editar</button></a>
						</td>
					</tr>
					@endforeach
				</table>
			</div>
			{{$inventario->render()}}
		</div>
	</div>
@endsection