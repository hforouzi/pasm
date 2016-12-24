<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Route;
use Illuminate\Http\Request;

use App\Http\Requests;

class MenuController extends Controller
{
    public function show()
    {
       /* $menu_array=(Menu::all("menu_name","menu_slug")) ;
        dd($menu_array);*/
        $allRoute=Route::all();
        $group_route=($allRoute->groupBy('route_controller'));
        return view("menu.save_menu_name",compact("group_route"));
    }

    public function get_data(Request $request)
    {
        $array_data=$request->all();
        foreach (explode(",",$array_data['array_check']) as $item) {
            $route_name=Route::find($item);

            if(!is_null($route_name['route_name']))
            {
                Menu::create([
                    'menu_name'=>$array_data["menu_name"],
                    'menu_slug'=>$route_name['route_name'],
                    'menu_order'=>1
                ]);
            }
            else
            {
                Menu::create([
                    'menu_name'=>$array_data["menu_name"],
                    'menu_slug'=>$route_name['route_path'],
                    'menu_order'=>1
                ]);
            }

        }
        return redirect("menu/show");
    }


}
