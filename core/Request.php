<?php


class Request
{
	var $url, $type, $length, $query, $data;
	
	public function __construct($config) {
		$this -> url    = $this -> getVar('REQUEST_URI', '/');
		$this -> type   = $this -> getVar('CONTENT_TYPE');
		$this -> length = $this -> getVar('CONTENT_LENGTH', 0);
		$this -> query  = explode("/", rtrim($_GET['uri'], '/'));
		//$this -> query = $_GET;
		//$this -> data = $_POST;
	}

	public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
        return $this;
    }

	public function getVar($var, $default = '') {
		if(isset($_SERVER[$var])){
			return $_SERVER[$var];
		} else {
			return $default;
		}
    }
}

?>