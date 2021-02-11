<?php
 
use Tabuna\Breadcrumbs\Trail;

use Illuminate\Database\Eloquent\Model ; 
use Illuminate\Http\Request;

    /*

    Route::get('menus', function (){ return (new App\Http\Controllers\Backend\crudController)->index(App\Models\Menu::class);})
    ->name('menuIndex')
    ->breadcrumbs(function (Trail $trail) 
    {
    $trail->push(__('Menus'), route('admin.menuIndex'));
    }
    );

    Route::get('menus/create', function (){ return (new App\Http\Controllers\Backend\crudController)->create(App\Models\Menu::class);})
    ->name('menuCreate')
    ->breadcrumbs(function (Trail $trail) 
    {
    $trail->push(__('Menus'), route('admin.menuCreate'));
    }
    );
               
    Route::post('menus/store', function (Request $request){ 
        return (new App\Http\Controllers\Backend\crudController)->store(  $request,App\Models\Menu::class);
    }
    )
    ->name('menuStore')
    ->breadcrumbs(function (Trail $trail) 
    {
    $trail->push(__('Menus'), route('admin.menuStore'));
    }
    );
           */


    Route::get('menumanager',[App\Http\Controllers\Backend\MenuManagerController::class,'index'])
    ->name('menumanager')
    ;

    Route::post('menumanager',[App\Http\Controllers\Backend\MenuManagerController::class,'store'])
    ->name('menumanager')
    ;

   // use App\Http\Controllers\Backend ;
    Route::delete('menumanager/{id}' , function ( $menu ) {
         
        return (new App\Http\Controllers\Backend\MenuManagerController)->destroy(  $menu) ;
     
    }  )
    ->name('menumanagerDelete')
    ;