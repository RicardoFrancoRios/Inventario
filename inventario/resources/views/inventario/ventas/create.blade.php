@extends ('admin.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva venta</h3>
				@if(count($errors)>0)
					<div class="alert alert-danger">
					<ul>
						@foreach($errors->all() as $error)
							<li>{{$error}}</li>
						@endforeach()
					</ul>
				@endif
				{!!Form::open(array('url'=>'inventario/ventas','method'=>'POST','autocomplete'=>'off'))!!}
				{{Form::token()}}
				<script type="text/javascript">
					function numeros(e){
						key=e.keyCode || e.which;
						teclado=String.formCharCode(key);
						numero = "0123456789";
						especiales="8-37-38-46";
						teclado_especial=false;

						for(var i in especiales){
							if (key==especiales[i]) {
								teclado_especial=true;
							}
						}

						if (numero.indexOf(teclado)==-1 && !teclado_especial) {
							return false;
						}
					}
				</script>
				<div class="form-group">
					<label for="idProductoVentaFK"> Producto </label>
					<select name="idProductoVentaFK" class="form-control" id="idProductoVentaFK">
					<option value="0" selected>Elije una opción</option>
					@foreach($productos as $pro)
					<option value="{{$pro->idProductoPK}}">{{$pro->nombreProducto}}</option>
					@endforeach
				</select>
				</div>
				<div class="form-group">
					<label for="cantidadVenta"> Cantidad </label>
					<input type="text" name="cantidadVenta" class="form-control" onkeypress="return numeros(event)" onpaste="return false">
				</div>
				<div class="form-group">
					<button class="btn btn-primary" type="submit"> Comprar</button>
					<a class="btn btn-danger" href="{{ URL::previous() }}">Cancelar</a>
				</div>
				{!!Form::close()!!}
			</div>
		</div>
	</div>
@endsection