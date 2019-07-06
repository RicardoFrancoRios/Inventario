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
				{!!Form::model($inventario,['method'=>'PATCH','route'=>['inv.update',$inventario->idInventario]])!!}
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
					<label for="idProductoInventarioFK"> Producto </label>
					<select name="idProductoInventarioFK" class="form-control">
					<option value="0">Elije una opción</option>
					@foreach($productos as $pro)
					@if($pro->idProductoPK==$inventario->idProductoInventarioFK)
					<option value="{{$pro->idProductoPK}}" selected>{{$pro->nombreProducto}}</option>
					@else
					<option value="{{$pro->idProductoPK}}">{{$pro->nombreProducto}}</option>
					@endif
					@endforeach
				</select>
				</div>
				<div class="form-group">
					<label for="cantidadInventario"> Cantidad </label>
					<input type="text" name="cantidadInventario" class="form-control" value="{{$inventario->cantidadInventario}}" onkeypress="return numeros(event)" onpaste="return false">
				</div>
				<div class="form-group">
					<label for="loteInventario"> Lote </label>
					<input type="text" name="loteInventario" class="form-control" value="{{$inventario->loteInventario}}">
				</div>
				<div class="form-group">
					<label for="fechaVencimientoInventario"> Fecha Vencimiento </label>
					<input type="text" name="fechaVencimientoInventario" class="form-control" placeholder="AAAA-MM-DD" value="{{$inventario->fechaVencimientoInventario}}" onkeypress="return numeros(event)" onpaste="return false">
				</div>
				<div class="form-group">
					<button class="btn btn-primary" type="submit"> Modificar</button>
					<a class="btn btn-danger" href="{{ URL::previous() }}">Cancelar</a>
				</div>
				{!!Form::close()!!}
			</div>
		</div>
	</div>
@endsection