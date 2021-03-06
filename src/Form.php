<?php

namespace Tourbillon\Form;

use OutOfBoundsException;
use Tourbillon\Request\HttpRequest;

/**
 * Description of Form
 *
 * @author oem
 */
class Form {
    
    private $fields;
    
    public function __construct() {
        $this->fields = [];
    }
    
    public function add($name) {
        $this->fields[$name] = new Field($name);
        return $this;
    }
    
    public function exist($name) {
        return array_key_exists($name, $this->fields);
    }
    
    public function get($name) {
        if (!$this->exist($name)) {
            throw new OutOfBoundsException("key {$name} does not exist");
        }

        return $this->fields[$name];
    }
    
    public function handleRequest(HttpRequest $request) {
        foreach ($request->postData() as $name => $data) {
            $this->get($name)->setValue($data);
        }
    }
    
    public function initialize(array $data) {
        foreach ($data as $name => $value) {
            $this->get($name)->setValue($value);
        }
    }
    
    public function getFields() {
        return $this->fields;
    }
    
    public function getFieldValue(Field $field) {
        return $field->getValue();
    }
    
    public function getData() {
        return array_map(array($this, 'getFieldValue'), $this->fields);
    }
}
