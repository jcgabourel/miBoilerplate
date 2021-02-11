<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
//use App\Http\Requests\MenuRequest;
use Illuminate\Http\Request;


class crudController extends Controller
{
    public function index( $modelo)
    {        
        $data=['name'=>$modelo::name(),'modelo'=>$modelo];             
        return view ('backend.Endpoints.Cruds.index' ,compact( 'data')) ;        
    }
   
    public function create( $modelo)
    {       
        $data=['name'=>$modelo::name(),'modelo'=>$modelo];
        return view ('backend.Endpoints.Cruds.create' ,compact( 'data')) ;
    }

    public function store(Request $request,$modelo)
    {
        

        $menu = $modelo::create($request->all());

        return response()->json($menu, 201);
    }

    public function show($id)
    {
        $menu = Menu::findOrFail($id);

        return response()->json($menu);
    }

    public function update(MenuRequest $request, $id)
    {
        $menu = Menu::findOrFail($id);
        $menu->update($request->all());

        return response()->json($menu, 200);
    }

    public function destroy($id)
    {
        Menu::destroy($id);

        return response()->json(null, 204);
    }
}