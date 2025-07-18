<?php

namespace app\routes;

class Routes {

    public static function get() {
        return [
            'get' => [
                '/' => 'IndexController@index',
                '/home'=> 'HomeController@index',
                '/login'=> 'LoginController@index',
                '/dashboard1' => 'Dashboard1Controller@index',
                
            ],
            'post' => [
              
          ]
        ];
    }
}
?>
