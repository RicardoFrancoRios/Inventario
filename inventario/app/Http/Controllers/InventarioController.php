<?php

namespace inventario\Http\Controllers;

use Illuminate\Http\Request;

use inventario\Http\Requests;

use inventario\Inventario;

use Illuminate\Support\Facades\Redirect;

use inventario\Http\Requests\InventarioFormRequest;

use DB;

class InventarioController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){
    	if ($request) {
    		$query=trim($request->get('searchText'));
    		$inventario=DB::table('tb_inventario as i')->join('tb_productos as p','i.idProductoInventarioFK','=','p.idProductoPK')->where('idProductoInventarioFK','LIKE','%'.$query.'%')
    		->orderBy('idProductoInventarioFK','desc')
    		->paginate(7);
    		return view('inventario.inv.index',["inventario"=>$inventario,"searchText"=>$query]);
    	}
    }
/*
    public function create(){
    	return view("inventario.inventario.create");
    }

    public function store(InventarioFormRequest $request){
    	$inventario = new Inventario;
    	$inventario->idProductoInventarioFK=$request->get('idProductoInventarioFK');
    	$inventario->cantidadInventario=$request->get('cantidadInventario');
    	$inventario->loteInventario=$request->get('loteInventario');
        $inventario->fechaVencimientoInventario =$request->get('fechaVencimientoInventario') ;
        $inventario->estado = "1";
    	$inventario->save();
        return Redirect::to('inventario/inventario');
        }
    }
*/
    public function show($id){
    	return view("inventario.inv.show",["inventario"=>inventario::findOrFail($id)]);
    }

    public function edit($id){
        $inventario=Inventario::findOrFail($id);
        $productos=DB::table('tb_productos')->get();
    	return view("inventario.inv.edit",["inventario"=>$inventario,"productos"=>$productos]);
    }

    public function update(InventarioFormRequest $request,$id){
        $inventario=Inventario::findOrFail($id);
        $inventario->idProductoInventarioFK=$request->get('idProductoInventarioFK');
        $inventario->cantidadInventario=$request->get('cantidadInventario');
        $inventario->precioUnitarioInventario=$request->get('precioUnitarioInventario');
        $inventario->loteInventario=$request->get('loteInventario');
        $inventario->fechaVencimientoInventario =$request->get('fechaVencimientoInventario') ;
        $inventario->estado = "1";
    	$inventario->update();
    	return Redirect::to('inventario/inv');
    }
/*
    public function destroy($id){
    	$venta=Ventas::findOrFail($id);
    	$venta->estado="0";
    	$venta->update();
    	return Redirect::to('inventario/ventas');
    }*/
}
