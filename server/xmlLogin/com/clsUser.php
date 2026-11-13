<?php

class clsUser {

    private string $action;
    private string $dni;
    private string $name;
    private string $last_name;
    private string $age;
    private string $password;


// register

    public function register() {


        $file = __DIR__ . "/../users.xml";   
        $xml = simplexml_load_file($file);


        $newUser = $xml->addChild('user');
        $newUser->addChild('dni', ($this->dni));
        $newUser->addChild('name', ($this->name));
        $newUser->addChild('last_name', ($this->last_name));
        $newUser->addChild('age', ($this->age));
        $newUser->addChild('password', ($this->password));


        $dom = new DOMDocument('1.0', 'UTF-8');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($xml->asXML());
        $dom->save($file);


        if ($dom->save($file) !== false) {

            return "Usuario registrado correctamente";
        }

        return "Error al guardar el usuario";   
        
        
        }


// login

    public function login() {


        $file = __DIR__ . "/../users.xml";   
        $xml = simplexml_load_file($file);


        $existingUser = $xml->xpath("user[dni='{$this->dni}']");


        $user = $existingUser[0];


        return "welcome " . $this->name;



        }


// setters

    public function set_dni(string $param) {

        $this->dni = $param;
    }

    public function set_name(string $param) {

        $this->name = $param;
    }

    public function set_last_name(string $param) {

        $this->last_name = $param;
    }

    public function set_age(string $param) {

        $this->age = $param;
    }

    public function set_password(string $param) {

        $this->password = $param;
    }

// getters

    public function get_dni() {

        return $this->dni;
    }

    public function get_name() {

        return $this->name;
    }

    public function get_last_name() {

        return $this->last_name;
    }

    public function get_age() {

        return $this->age;
    }

    public function get_password() {

        return $this->password;
    }
}

?>