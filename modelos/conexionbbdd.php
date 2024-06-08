<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

class ConexionDB {
    public $host;
    public $user;
    public $password;
    public $nombrebd;
    public $con;

    public function __construct() {
        $this->conectar();
    }

    public function conectar()
    {
        $this->host = 'localhost';
        $this->user = 'root';
        $this->password = '';
        $this->nombrebd = 'proyecto_base';

        try {
            $this->con = new mysqli($this->host, $this->user, $this->password, $this->nombrebd);
            
            if ($this->con->connect_error) {
                throw new Exception("Error de conexión: " . $this->con->connect_error);
            }
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }
}

class Register extends ConexionDB {
    public function registration($nombre, $apellidos, $email, $fecha_nacimiento, $password, $password_confirmation, $genero, $rol) {
        
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $fecha_objeto = new DateTime($fecha_nacimiento);
        $fecha_nacimiento = $fecha_objeto->format('Y-m-d');

        $duplicate = mysqli_query($this->con, "SELECT * FROM usuarios WHERE nombre_usuario='$nombre' OR email='$email'");

        if ($rol === "Administrador") {
            $rol = 1;
        } elseif ($rol === "Invitado") {
            $rol = 2;
        }

        if (mysqli_num_rows($duplicate) > 0) {
            return "El usuario o email ya está en uso. Por favor, prueba con otro.";
        } elseif ($password == $password_confirmation) {
            $hassed_password = password_hash($password, PASSWORD_DEFAULT);

            $query = $this->con->prepare("INSERT INTO usuarios (nombre_usuario, apellidos, email, id_rol, fecha_nacimiento, genero, password) 
            VALUES (?, ?, ?, ?, ?, ?, ?)");
            $query->bind_param('sssisss', $nombre, $apellidos, $email, $rol, $fecha_nacimiento, $genero, $hassed_password);

            try {
                if ($query->execute()) {
                    return array('mensaje' => 'Registro exitoso', 'exito' => true);
                } else {
                    throw new Exception("Error en la ejecución de la consulta: " . mysqli_error($this->con));
                }
            } catch (Exception $e) {
                return $e->getMessage();
            }
        } else {
            return "La contraseña no es la misma";
        }
    }
}

class Login extends ConexionDB{
    public $id;
    private $conexion;
    
    public function obtenerRolFromDatabase($userId) {
        $stmt = $this->con->prepare("SELECT id_rol FROM usuarios WHERE id = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $stmt->bind_result($rol);
        $stmt->fetch();
        $stmt->close();
    
        return $rol;
    }

    public function login($email, $password){
        $result = mysqli_query($this->con, "SELECT * FROM usuarios WHERE email = '$email'");
        $row = mysqli_fetch_assoc($result);

        if(mysqli_num_rows($result) > 0) {
            if(password_verify($password, $row["password"])){
                $this->id = $row["id"];
                return 1; // Login exitoso
            } else{
                return 10; // contraseña incorrecta
            }
        } else{
            return 100; // Usuario no registrado 
        }
    }

    public function idUser(){
        return $this->id;
    }

    public function obtenerRol($rol) {
        $stmt = $this->con->prepare("SELECT id_rol FROM usuarios WHERE id_rol = ?");
        $stmt->bind_param("i", $rol);
        $stmt->execute();
        $stmt->bind_result($id_rol);
        $stmt->fetch();
        $stmt->close();
    
        return $id_rol;
    } 
    
    function obtenerIdUsuarioDeSesion() {
        if (isset($_SESSION['id'])) {
            return $_SESSION['id'];
        } else {
            // Si no se encuentra un ID de usuario en la sesión, devuelve un valor por defecto o maneja el caso según tu lógica de aplicación
            return null; // o lanza una excepción, muestra un mensaje de error, etc.
        }
    }

}




?>