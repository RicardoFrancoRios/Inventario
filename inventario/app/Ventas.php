<?php

namespace inventario;

use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
	//Se declara la tabla a la que hace referencia el modelo y se especifican los campos de la misma
   protected $table = 'tb_ventas';

   protected $primaryKey = "idVentaPK";
   public $timestamps=false;

   protected $fillable=[
   		'idProductoVentaFK',
   		'precioProductoVenta',
   		'cantidadVenta',
   		'precioTotalVenta',
   ];
}
