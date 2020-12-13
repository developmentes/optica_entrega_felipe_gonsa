<?php


namespace controllers;

use models\ClienteModel as ClienteModel;

require_once("../models/ClienteModel.php");

class RegistroCliente
{
    public $rut_cliente;
    public $nombre_cliente;
    public $direccion_cliente;
    public $telefono_cliente;
    public $fecha_creacion;
    public $email_cliente;

    


    public function __construct()
    {
        $this->rut_cliente= $_POST['rut_cliente'];
        $this->nombre_cliente = $_POST['nombre_cliente'];
        $this->direccion_cliente = $_POST['direccion_cliente'];
        $this->telefono_cliente = $_POST['telefono_cliente'];
        $this->fecha_creacion = $_POST['fecha_creacion'];
        $this->email_cliente = $_POST['email_cliente'];
    }

    public function registrarCliente()
    {
        session_start();
        if ($this->rut_cliente == "" || $this->nombre_cliente == "" || $this->direccion_cliente == "" || $this->telefono_cliente == "" || $this->fecha_creacion == "" || $this->email_cliente == "") {
            $_SESSION['error'] = "Algunos campos estan vacios ,debe completar la informacion";
            header("Location: ../clientesAdmin.php");
            return;
        }
        $modelo = new ClienteModel();
        $data = ['rutCliente' => $this->rut_cliente, 'nombre_cliente' => $this->nombre_cliente, 'direccion_cliente' => $this->direccion_cliente ,
         'telefono_cliente' => $this->telefono_cliente, 'fecha_creacion' => $this->fecha_creacion , 'email_cliente' => $this->email_cliente];
        $count = $modelo->insertarCliente($data);

        if ($count == 1) {
            $_SESSION['respuesta'] = "Cliente Creado Con Éxito";
        } else {
            $_SESSION['error'] = "Hubo un error en la base de datos";
        }
        header("Location: ../views/vendedor/crearCliente.php");
    }
}

$obj = new RegistroCliente();




 
