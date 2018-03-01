<?php

use App\Role;
use Illuminate\Database\Seeder;
//use Illuminate\Support\Facades\Route;
use App\Route;
use Illuminate\Support\Facades\DB;

class RoutesTableSeeder extends Seeder
{
    const SystemAdmin = 'SYSADMIN';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$collection = Route::getRoutes();
//        \App\Models\RoleRoute::delete();
//        \App\Route::truncate();

        foreach ($collection as $route) {
            $action = $route->getAction();

            if ($action['prefix'] != 'api') {

                if (!is_object($action['uses'])) {

                    DB::transaction(function() use($route, $action) {

                        $sys_route = SystemRoute::create(['url' => $route->uri, 'action' => $action['uses']]);

                        $role = Role::where('code', self::SystemAdmin)->first();

                        $sys_route->roles()->attach($role);

                    });

                }

            }
        }*/
        \App\Models\RoleRoute::truncate();
        \Illuminate\Support\Facades\DB::table('routes')->delete();
        $admin = Role::where('code', self::SystemAdmin)->first();


        #### Dashboard
        $dashboard = new Route();
        $dashboard->route_name = 'Dashboard';
        $dashboard->icon = 'dashboard';
        $dashboard->sequence = 1;
        $dashboard->save();
        $dashboard_id = $dashboard->id;

        #### Dashboard child
        $analytics_dash = new Route();
        $analytics_dash->route_name = 'Analytics Dashboard';
        $analytics_dash->url = 'home';
        $analytics_dash->parent_route = $dashboard_id;
        $analytics_dash->save();
        $analytics_dash->roles()->attach($admin);

        ##masterfiles
        $masterfile = Route::create([
            'route_name'=>'Masterfiles',
            'icon'=>'supervisor_account',
            'sequence'=>2,
        ]);

        //master files children
        $masterFileChild = Route::create([
            'route_name'=>'All masterfiles',
            'url'=>'masterFiles',
            'parent_route'=>$masterfile->id,
        ]);
        $masterFileChild->roles()->attach($admin);

        ## configurations
        $configurations = Route::create([
            'route_name'=>'Configurations',
            'icon'=>'list',
            'sequence'=>3,
        ]);

        //configurations children
        $configurationChild = Route::create([
            'route_name'=>'Business Categories',
            'url'=>'categories',
            'parent_route'=>$configurations->id,
        ]);
        $configurationChild->roles()->attach($admin);
//        //plenary sitting
//        $configurationChild = Route::create([
//            'route_name'=>'Plenary sittings',
//            'url'=>'plenarySittings',
//            'parent_route'=>$configurations->id,
//        ]);
//        $configurationChild->roles()->attach($admin);




        #### user management
        $user_mngt = new Route();
        $user_mngt->route_name = 'User Management';
        $user_mngt->icon = 'settings';
        $user_mngt->sequence = 6;
        $user_mngt->save();
        $user_mngt_id = $user_mngt->id;
//
        #### user management children
        $all_user = new Route();
        $all_user->route_name = 'System Users';
        $all_user->url = 'users';
        $all_user->parent_route = $user_mngt_id;
        $all_user->save();
        $all_user->roles()->attach($admin);

        $roles = new Route();
        $roles->route_name = 'User Roles';
        $roles->url = 'roles';
        $roles->parent_route = $user_mngt_id;
        $roles->save();
        $roles->roles()->attach($admin);

//        #### system
//        $system = new Route();
//        $system->route_name = 'System Settings';
//        $system->icon = 'settings';
//        $system->sequence = 7;
//        $system->save();
//        $system_id = $system->id;
//
//        #### system children
//        $routes = new Route();
//        $routes->route_name = 'System Routes';
//        $routes->url = 'routes';
//        $routes->parent_route = $system_id;
//        $routes->save();
//        $routes->roles()->attach($admin);
    }
}
