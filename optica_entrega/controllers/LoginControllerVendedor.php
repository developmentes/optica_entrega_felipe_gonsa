
<?php



use models\UsuarioModel as UsuarioModel;

require_once("../models/UsuarioModel.php");

class LoginControllerVendedor {
    public $rut;
    public $clave;
    public $rol;


    public function __construct()
    {
        $this->rut = $_POST['rut'];
        $this->clave = $_POST['clave'];
    
    }

    public function iniciarSesion()
    {
        session_start();
        if ($this->rut == "" || $this->clave == "") {
            $_SESSION['error'] = "rut o usuario incorrecto";
            header("Location: ../views/vendedor/loginVendedor.php");
            return;
        }
        $modelo = new UsuarioModel();
        $array = $modelo->buscarUsuarioLogin($this->rut);
        if (count($array) == 0) {
            $_SESSION['error'] = "rut o clave no se encuentra";
            header("Location: ../views/vendedor/loginVendedor.php");
            return;
        }

         $_SESSION['vendedor'] = $array[0];
        
        header("Location: ../views/vendedor/crearCliente.php");
    }
}

$obj = new LoginControllerVendedor();
$obj->iniciarSesion();
