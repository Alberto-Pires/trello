<?php 
    namespace app\controllers;

    class HomeController {
        public function __construct(){
            $this->index();
        }
        public function index() {
          include_once __DIR__.DIRECTORY_SEPARATOR.'../views/index/home.php';
        }
    }
 ?>
