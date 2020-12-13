<?php

namespace controllers;

use models\UsuarioModel as UsuarioModel;

require_once("../models/UsuarioModel.php");

class CrearUsuarioController
{
    public $rut;
    public $nombre;
  

    


    public function __construct()
    {
        $this->rut = $_POST['rut'];
        $this->nombre = $_POST['nombre'];
    }

    public function registrarUsuario()
    {

        
        session_start();
        if ($this->rut == "" || $this->nombre == "" ) {
            $_SESSION['error1'] = "Complete la informacion";
            header("Location: ../views/crearUsuario.php");
            return;
        }
        $modelo = new UsuarioModel();
        $data = ['rut' => $this->rut, 'nombre' => $this->nombre, 'rol' => 'vendedor' , 'clave' => '123456', 'estado' => 1];
        $count = $modelo->insertarUsuario($data);

        if ($count == 1) {
            $_SESSION['respuesta1'] = "Usuario Creado Con Éxito";
            $this->rut == "" ;
        } else {
            $_SESSION['error1'] = "Hubo un error en la base de datos";
        }
        header("Location: ../views/crearUsuario.php");
    }
}

$obj = new CrearUsuarioController();
$obj->registrarUsuario();


