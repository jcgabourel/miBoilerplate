<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu ;

class MenuManagerController extends Controller
{
    //
    public function index()
    {
        $menus = Menu::all();       
        return view('backend.menumanager',compact('menus')) ;
    }

     public function store (Request $request)
     {
        
        $request->validate([
            'title' => 'bail|required' ,
            'href' => 'required'
        ]);
        
        $data =$request->all() ;
      
        if ($data['menu_Id']== null)
            $data['menu_Id']=0 ;
        elseif($data['menu_Id']!=0 && Menu::find($data['menu_Id'])== null)
            $data['menu_Id']=0 ;

        if ($data['menu_Id']==0)
            $parentlevel=0 ; 
        else
            $parentlevel = Menu::select('level')->where('id',$data['menu_Id'])->first()->level;
        
        $data['level'] = $parentlevel +1 ;
          
        $mxorden = Menu::where('menu_Id',$data['menu_Id'])->orderBy('orden', 'desc')->first() ;       
     
        if ($mxorden == null || $mxorden->count() ==0)
            $data['orden'] =1;
        else 
            $data['orden'] = $mxorden->orden  +1;
            
           
             


        $menu =   Menu::create($data);
       
        
        $menu->save();


       

       
        $menus = Menu::all();       
        return view('backend.menumanager',compact('menus')) ;


     }


     public function destroy ( $Menu)
     {

        $mmenu = Menu::find($Menu);
        $mmenu->delete();
        $menus = Menu::all();       
        return view('backend.menumanager',compact('menus')) ;

     }
}
