<?php

    class aboutme extends Controller {
        
        public function index() {
              echo "jestem w  app/controllers/aboutme.php";

              $this->view("aboutme/index");
        }
    }
?>