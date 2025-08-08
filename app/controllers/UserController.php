<?php 
    namespace app\controllers;

    class UserController {
        public function __construct(){
            $this->index();
        }
        public function index() {
          include_once __DIR__.DIRECTORY_SEPARATOR.'../models/User.php';
        }
    }
 ?>
