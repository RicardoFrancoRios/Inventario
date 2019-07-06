@extends ('admin.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de ventas <a href="ventas/create"><button class="btn btn-success">Nueva venta</button></a></h3>
			@include('inventario.ventas.search')
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id Venta</th>
						<th>Producto</th>
						<th>Cantidad</th>
						<th>Precio Total</th>
						<!--<th>Opciones</th>-->
					</thead>
					@foreach($ventas as $venta)
					<tr>
						<td>{{$venta->idVentaPK}}</td>
						<td>{{$venta->nombreProducto}}</td>
						<td>{{$venta->cantidadVenta}}</td>
						<td>{{$venta->precioTotalVenta}}</td>
						<!--<td>
							<a href=""></a><button class="btn btn-info">Editar</button>
							<a href=""></a><button class="btn btn-danger">Eliminar</button>
						</td>-->
					</tr>
					@endforeach
				</table>
			</div>
			{{$ventas->render()}}
		</div>
	</div>
@endsection