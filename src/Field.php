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
    private $options;

    public function __construct($name, array $options = array()) {
        $this->name = $name;
        $this->options = array_merge([
            'security' => true
        ], $options);
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
        return $this->options['security']
                ? $this->secureValue($this->value)
                : $this->value;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function setValue($value) {
        $this->value = $value;
        return $this;
    }

    private function secureValue($value) {
        if (is_array($value)) {
            foreach ($value as $k => $v) {
                $value[$k] = $this->secureValue($v);
            }
        } else {
            $value = htmlspecialchars($value);
        }
        return $value;
    }
}
