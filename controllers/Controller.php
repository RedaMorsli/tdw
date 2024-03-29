<?php

abstract class Controller {

    public function __construct(){
        $this->loadModel('StringModel');
    }

    public function loadModel(string $model){
        require_once(ROOT.'models/'.$model.'.php');
        $this->$model = new $model();
    }


    public function render(string $file, array $data = []){
        extract($data);

        ob_start();

        require_once(ROOT.'views/'.strtolower(get_class($this)).'/'.$file.'.php');

        $content = ob_get_clean();

        require_once(ROOT.'views/layouts/default.php');
    }
}