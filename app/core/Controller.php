<?php

    /**
     * kontroler apliakcji
     */
    class Controller {

        /**
         * tworzy instancje modelu według wskazanej klasy
         *
         * @param string $model nazwa modelu
         * @return object zwraca utworzoną instancję
         * @source source: https://www.youtube.com/watch?v=FWLXYPIxbYI
         */
        public function model($model) {
            // echo $model;
            require_once "app/models/$model.php";
            return new $model();
        }


        /**
         * Undocumented function
         *
         * @param [type] $view
         * @param array $data
         * @return void
         * @source https://www.youtube.com/watch?v=hflDKUIP3QA
         */
        public function view($view, $data = []) {
            require_once "app/views/header.php";
            require_once "app/views/$view.php";
            require_once "app/views/footer.php";
        }   
    }

?>