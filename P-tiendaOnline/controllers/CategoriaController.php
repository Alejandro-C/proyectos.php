<?php
require_once "models/categoria.php";

class categoriaController {
    public function index() {
        $categoria = new Categoria();
        $categorias = $categoria->getAll();

        require_once 'views/categoria/index.php';
    }

    public function crear(){
        Utils::isAdmin();
        require_once 'views/categoria/crear.php';
    }

    public function save(){
        Utils::isAdmin();
        $categoria = new Categoria();

        if (isset($_POST) && isset($_POST['nombre'])){
            $categoria->setNombre($_POST['nombre']);
            $save = $categoria->save();
        }

        header("location:".base_url."categoria/index");
    }
}