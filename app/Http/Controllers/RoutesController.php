<?php

namespace App\Http\Controllers;

use App\Models\RoleRoute;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Yajra\DataTables\DataTables;

class RoutesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('system_manager.routes');
    }

    public function getPermissions($id){
        $all_routes = RoleRoute::where('role_id',$id)->pluck('route_id')->toArray();

        return DataTables::of(\App\Route::where('parent_route','<>',null))
//            ->editColumn('action',function (\App\Route $route){
//                $action = explode('Controllers\\',$route->action);
//                return $action[1];
//            })
            ->editColumn('id',function (\App\Route $route) use($all_routes){
                if(in_array($route->id,$all_routes)){
                    $checked = '<input type="checkbox" class="i-check menu-permission" value='.$route->id.' checked>';
                }else{
                    $checked =  '<input type="checkbox" class="i-check menu-permission" value='.$route->id.' >';
                }
                return $checked;
            })->rawColumns(['id'])
            ->make(true);
    }

    public function assignPermissions(\Illuminate\Http\Request $request){
        $status = [];
        if($request->action == 'allocate'){
            $role = new RoleRoute();
            $role->role_id = $request->role_id;
            $role->route_id = $request->route_id;
            try{
                $role->save();
                $status['status'] = ["state"=>"success","message"=>"Permission has been granted"];
            }catch (QueryException $exception){
                $status['status'] = $exception->errorInfo[2];
            }

        }else{
            try{
//                $role = DB::table("role_route")->where([
//                    ['role_id','=', $request->role_id],
//                    ['route_id','=', $request->route_id],
//                ])->delete();
                $role = RoleRoute::where([
                    ['role_id','=', $request->role_id],
                    ['route_id','=', $request->route_id],
                ])->delete();
//                $role->delete();
                $status['status'] = ["state"=>"success","message"=>"Permission has been removed"];
            }catch (QueryException $exception){
                $status['status'] = $exception->errorInfo[2];
            }
        }
        return response()->json($status);
    }
}
