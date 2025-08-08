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
            '/user' => 'UserController@index',
            '/logout' => 'LoginController@logout',
            '/cadastrar' => 'CadastrarController@index',
            '/recuperar' => 'RecuperarController@index',
            '/redefinir' => 'RedefinirController@index',
        ],

        'post' => [
            '/login' => 'LoginController@index',
            '/cadastrar' => 'CadastrarController@store',
            '/recuperar/enviar' => 'RecuperarController@enviar',
            '/recuperar/atualizar' => 'RecuperarController@atualizar',
        ]
        ];
    }
}
?>
