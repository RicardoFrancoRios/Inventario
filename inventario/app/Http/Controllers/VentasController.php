<?php

namespace inventario\Http\Controllers;

use Illuminate\Http\Request;

use inventario\Http\Requests;

use inventario\Ventas;

use inventario\Inventario;

use Illuminate\Support\Facades\Redirect;

use inventario\Http\Requests\VentasFormRequest;

use DB;

class VentasController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){
    	if ($request) {
    		$query=trim($request->get('searchText'));
    		$ventas=DB::table('tb_ventas as v')->join('tb_productos as p' , 'v.idProductoVentaFK','=','p.idProductoPK')->where('idProductoVentaFK','LIKE','%'.$query.'%')
    		->orderBy('idProductoVentaFK','desc')
    		->paginate(7);
    		return view('inventario.ventas.index',["ventas"=>$ventas,"searchText"=>$query]);
    	}
    }

    public function create(){
        $productos=DB::table('tb_productos')->get();
    	return view("inventario.ventas.create",["productos"=>$productos]);
    }

    public function store(VentasFormRequest $request){
    	$ventas = new Ventas;
        $inventario=DB::table('tb_inventario')->get();
    	$ventas->idProductoVentaFK=$request->get('idProductoVentaFK');
        $v = (int)$ventas->idProductoVentaFK;
        var_dump($v);
        foreach ($inventario as $inv) {
            var_dump($inv->idProductoInventarioFK);
           if($v==$inv->idProductoInventarioFK){
            $ventas->precioProductoVenta=$inv->precioUnitarioInventario;
            }
        }
    	$ventas->cantidadVenta=$request->get('cantidadVenta');
    	$ventas->precioTotalVenta=$ventas->precioProductoVenta*$ventas->cantidadVenta;
        foreach ($inventario as $inv) {
        if($v==$inv->idProductoInventarioFK){
        $inv->cantidadInventario = $inv->cantidadInventario - $ventas->cantidadVenta;
        }
        }
    	$ventas->save();
        return Redirect::to('inventario/ventas');
    }

    public function show($id){
    	return view("inventario.ventas.show",["venta"=>Ventas::findOrFail($id)]);
    }
/*
    public function edit($id){
    	return view("inventario.venta.edit",["venta"=>Ventas::findOrFail($id)]);
    }

    public function update(VentasFormRequest $request,$id){
    	$venta=Ventas::findOrFail($id);
    	$venta->idProductoVentaFK=$request->get('idProductoVentaFK');
    	$venta->cantidadVenta=$request->get('cantidadVenta');
    	$venta->precioTotalVenta=$request->get('precioTotalVenta');
    	$venta->update();
    	return Redirect::to('inventario/ventas');
    }

    public function destroy($id){
    	$venta=Ventas::findOrFail($id);
    	$venta->estado="0";
    	$venta->update();
    	return Redirect::to('inventario/ventas');
    }*/
}
