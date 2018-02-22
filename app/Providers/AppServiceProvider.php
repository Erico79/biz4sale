<?php

namespace App\Providers;

use App\Models\RoleRoute;
use App\Route as SystemRoutes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /*view()->composer(['layouts.partials.sidebar'], function($view) {
            $menu = [
                (object) [
                    'title' => 'Home',
                    'icon' => 'home',
                    'url' => 'home',
                    'parent' => false
                ],
                (object) [
                    'title' => 'Masterfiles',
                    'icon' => 'supervisor_account',
                    'url' => '#',
                    'id' => 'mfs',
                    'parent' => true,
                    'children' => [
                        (object) [ 'title' => 'All Masterfiles', 'url' => 'masterFiles' ],
                    ]
                ],
                (object) [
                    'title' => 'Configurations',
                    'icon' => 'list',
                    'url' => '#',
                    'id' => 'configurations',
                    'parent' => true,
                    'children' => [
                        (object) ['title' => 'Sessions', 'url' => 'sessions'],
                        (object) ['title' => 'Plenary sittings', 'url' => 'plenarySittings'],
                    ]
                ],
                (object) [
                    'title' => 'Committees',
                    'icon' => 'group',
                    'url' => '#',
                    'id' => 'committees',
                    'parent' => true,
                    'children' => [
                        (object) ['title' => 'Committees', 'url' => 'committees'],
                        (object) ['title' => 'Committee Documents', 'url' => 'committeeDocuments'],
                    ]
                ],
//                (object) [
//                    'title' => 'Broadcasts',
//                    'icon' => 'record_voice_over',
//                    'url' => '#',
//                    'id' => 'broadcasts',
//                    'parent' => true,
//                    'children' => [
//                        (object) ['title' => 'Broadcast Types', 'url' => 'broadcastTypes'],
//                        (object) ['title' => 'All Broadcasts', 'url' => 'broadcasts'],
////                        (object) ['title' => 'Document Categories', 'url' => 'documentCategories']
//                    ]
//                ],
                (object) [
                    'title' => 'House Business',
                    'icon' => 'insert_drive_file',
                    'url' => '#',
                    'id' => 'document-manager',
                    'parent' => true,
                    'children' => [
//                        (object) ['title' => 'All', 'url' => 'broadcast/all']
                        (object) ['title' => 'Document Categories', 'url' => 'documentCategories'],
                        (object) ['title' => 'Upload Documents', 'url' => 'documents']
                    ]
                ],
                (object) [
                    'title' => 'User Manager',
                    'icon' => 'account_circle',
                    'url' => '#',
                    'id' => 'user-account',
                    'parent' => true,
                    'children' => [
                        (object) [ 'title' => 'System Users', 'url' => 'users' ],
                        (object) [ 'title' => 'Roles', 'url' => 'roles' ],
                        (object) [ 'title' => 'Audit Trail', 'url' => 'audits' ],
                    ]
                ],
                (object) [
                    'title' => 'System Manager',
                    'icon' => 'settings',
                    'url' => '#',
                    'id' => 'sys_man',
                    'parent' => true,
                    'children' => [
                        (object) [ 'title' => 'Routes', 'url' => 'admin/routes' ],
                    ]
                ]
            ];

            $view->with('menu', $menu)->with('current_route', Route::current());
        });*/
        view()->composer(['layouts.partials.sidebar'], function($view) {
            $menu = [];
            $role = Auth::user()->role_id;
            $role_routes = RoleRoute::where('role_id',$role)
                ->pluck('route_id')
                ->toArray();
            if(count($role_routes)){
                $all_routes = SystemRoutes::all();
                $menus = $all_routes->wherein('id',$role_routes);
//                    print_r($menus);die();
                if(count($menus)){
                    $parent_menus_all = $menus->pluck('parent_route')->toArray();
                    $parent_menus = array_unique($parent_menus_all);
                    $whole_object = [];
//                    print_r();die();
                    $count = 101;
                    foreach ($parent_menus as $parent_menu){
                        $children = $menus->where('parent_route',$parent_menu)->toArray();
//                        var_dump($children);die();
                        $children_obj = [];
                        foreach ($children as $child){
                            $children_obj[] =(object)[
                                'title'=>$child['route_name'],
                                'url'=>$child['url'],

                            ];
                        }
                        $pmenu = $all_routes->find($parent_menu)->toArray();
//                        prin($pmenu);die;
                        $whole_object[] = (object)[
                            'title'=>$pmenu['route_name'],
                            'icon'=>$pmenu['icon'],
                            'url'=>'#',
                            'id'=>'idA'.$count,
                            'parent'=>true,
                            'children'=>$children_obj
                        ];
//                            print_r($whole_object);die();
                        $count++;
                    }
                    $menu = $whole_object;
                }
            }

            $view->with('menu', $menu)->with('current_route', Route::current());
        });
    }
}
