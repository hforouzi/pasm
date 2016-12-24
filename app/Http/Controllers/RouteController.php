<?php

namespace App\Http\Controllers;

use App\Route;
use Bican\Roles\Models\Permission;
use Illuminate\Http\Request;

use App\Http\Requests;

class RouteController extends Controller
{
    public function index()
    {
        $routeCollection = \Route::getRoutes();
        foreach ($routeCollection as $value) {
            $instance = Route::firstOrNew([
                'route_path'=>$value->getPath(),
                'route_name'=>$value->getName(),
                'route_method'=>$value->getMethods()[0],
                'route_action'=>$value->getActionName(),
               // 'route_controller'=>substr(class_basename($value->getActionName()),0,strpos(class_basename($value->getActionName()),"@")),
            ]);
            $instance->fill([
                'route_path'=>$value->getPath(),
                'route_name'=>$value->getName(),
                'route_method'=>$value->getMethods()[0],
                'route_action'=>$value->getActionName(),
                'route_controller'=>substr(class_basename($value->getActionName()),0,strpos(class_basename($value->getActionName()),"@")),

            ])->save();
        }
    }

    public function show()
    {
        $allRoute=Route::all();
        $group_route=($allRoute->groupBy('route_controller'));
        return view("permissions.show_route_list",compact("group_route"));
    }

    public function get_data(Request $request)
    {
   //     Permission::create()
        $array_data=$request->all();
        foreach (explode(",",$array_data['array_check']) as $item) {
            $route_name=Route::find($item);
            if(!is_null($route_name['route_name']))
            {
                Permission::create([
                    'name'=>$array_data["per_name"],
                    'slug'=>$route_name['route_name'],
                    'model'=>"App\\".substr($route_name['route_controller'],0,-10)
                ]);
            }
        }
       return redirect('routelist/show')->with('message',"با موفقیت اضافه شد");
    }
}
