<?php
class Room {
    private $id;
    private $privated;

    public function __construct ($datos){
        $this->id = $datos['id'];
        $this->privated = $datos['privated'];
    }

    //método magico Get
    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }
    public function getId(){
        return $this->id;
    }
    public function getPrivated(){
        return $this->privated;
    }
}

?>