<?php

class Home extends Controller {
    public function index($name = ''){
        // echo "home index<br>name: $name<br>";

        // creating some model
        $user = $this->model('User');
        $user->name = $name;
        // echo $user->name;

        // mapping view
        $this->view("home/index", $user); // przekazalem cala instancje model-user
    }
}