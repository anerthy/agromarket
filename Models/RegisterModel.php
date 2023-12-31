<?php

class RegisterModel extends Mysql
{
    public $strCedula;
    public $strNombre;
    public $strApellido1;
    public $strApellido2;
    public $strDireccion;
    public $strTelefono;
    public $strEstado;
    public $strEmail;
    public $strUsuario;
    public $strContrasena;
    public $intRol;

    public function __construct()
    {
        parent::__construct();
    }

    public function registerPersonUser(
        string $cedula,
        string $nombre,
        string $apellido1,
        string $apellido2,
        string $direccion,
        string $telefono,
        string $email,
        string $usuario,
        string $contrasena
    ) {
        $return = "";
        $this->strCedula        = $cedula;
        $this->strNombre        = $nombre;
        $this->strApellido1     = $apellido1;
        $this->strApellido2     = $apellido2;
        $this->strDireccion     = $direccion;
        $this->strTelefono      = $telefono;
        $this->strEstado        = 'Activo';
        $this->strEmail         = $email;
        $this->strUsuario       = $usuario;
        $this->strContrasena    = $contrasena;
        $this->intRol           = 3;

        $sql_person = "SELECT per_cedula 
                FROM personas
                WHERE per_cedula = '{$this->strCedula}' ";
        $request_person = $this->select_all($sql_person);

        $sql_user = "SELECT usr_nombre 
                FROM usuarios
                WHERE usr_email = '{$this->strEmail}' ";
        $request_user = $this->select_all($sql_user);

        if (empty($request_person) && empty($request_user)) {
            $query = "CALL InsertarPersonaUsuario(?,?,?,?,?,?,?,?,?);";
            $arrData = array(
                $this->strCedula,
                $this->strNombre,
                $this->strApellido1,
                $this->strApellido2,
                $this->strDireccion,
                $this->strTelefono,
                $this->strEmail,
                $this->strUsuario,
                $this->strContrasena
            );
            $request_procedure = $this->procedure($query, $arrData);
            $return = $request_procedure;
        } else {
            $return = "exist";
        }
        return $return;
    }
}
