<?php

/**
 * @author  ArtMares (Dmitriy Dergachev)
 * @date    01.03.2016
 */

if(!function_exists('loadStorage')) {
    function &loadStorage() {
        static $storage;
        if(is_null($storage)) $storage = new Storage();
        return $storage;
    }
}

class Storage {
    private $data = array();

    public function __set($name, $value) {
        $this->data[$name] = $value;
    }

    public function __get($name) {
        if($this->__isset($name)) {
            return $this->data[$name];
        }
        return null;
    }

    public function __isset($name) {
        return isset($this->data[$name]);
    }

    public function __unset($name) {
        unset($this->data[$name]);
    }
}