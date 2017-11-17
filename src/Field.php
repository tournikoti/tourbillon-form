<?php

namespace Tourbillon\Form;

/**
 * Description of Field
 *
 * @author oem
 */
class Field {

    private $name;
    private $value;

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }
    
    public function isChecked($value) {
        if (is_array($this->value)) {
            return in_array($value, $this->value);
        }
        return $this->value === $value;
    }

    public function getValue() {
        return $this->value;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function setValue($value) {
        $this->value = $value;
        return $this;
    }

}
