<?php

namespace App\Http\Middleware;

use Menu;
use Closure;

class GenerateMenu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Menu::make('admin', function ($menu) {

            //Home
            $menu->add('Dashboard', '#')->data('icon', 'home');


            //Users
            $users = $menu->add('Users', '#')->data('icon', 'key');
            $users->add('Manage', 'users')->data('icon', 'users');
            $users->add('Roles', 'roles')->data('icon', 'shield');
            $users->add('Permissions', 'permissions')->data('icon', 'tag');


            $config = $menu->add('Configurations', '#')->data('icon', 'gears');
            $config->add('Extensions', '#')->data('icon', 'plug')
                   ->data('permission', 'extension.view');;
            $config->add('Global', '#')->data('icon', 'globe')
                   ->data('permission', 'utilities.config');;      

            $admin = $menu->add('Administration', '#')->data('icon', 'cog');
            $admin->add('Utilities', 'utilities');
            $admin->add('Suppliers', 'suppliers');
        });

        $response = $next($request);
        return $response;
    }
}