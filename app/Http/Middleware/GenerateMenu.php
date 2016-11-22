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
            $users->add('Roles', '#')->data('icon', 'shield')
                  ->data([
                      'permission' => 'role.view',
                      'append'     => '#',
                  ]);
            $users->add('Permissions', '#')->data('icon', 'tag')
                  ->data([
                      'permission' => 'permission.view',
                      'append'     => '#',
                  ]);

            $config = $menu->add('Configurations', '#')->data('icon', 'gears');
            $config->add('Extensions', '#')->data('icon', 'plug')
                   ->data('permission', 'extension.view');;
            $config->add('Global', '#')->data('icon', 'globe')
                   ->data('permission', 'utilities.config');;      

            $utilities = $menu->add('Utilities', '#')->data('icon', 'wrench');
            $utilities->add('Suppliers', 'suppliers');
        });

        $response = $next($request);
        return $response;
    }
}