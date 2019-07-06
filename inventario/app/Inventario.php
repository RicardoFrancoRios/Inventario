<?php

namespace inventario;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
	//Se declara la tabla a la que hace referencia el modelo y se especifican los campos de la misma
   protected $table = 'tb_inventario';

   protected $primaryKey = "idInventario";
   public $timestamps=false;

   protected $fillable=[
   		'idProductoInventarioFK',
   		'cantidadInventario',
         'precioUnitarioInventario',
   		'loteInventario',
   		'fechaVencimientoInventario',
   		'estado',
   ];
}
