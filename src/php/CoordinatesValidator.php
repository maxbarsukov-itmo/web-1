<?php

class CoordinatesValidator {
    private $x;
    private $y;
    private $r;

    public function __construct($x, $y, $r) {
      $this->x = $x;
      $this->y = $y;
      $this->r = $r;
    }

    public function checkData() {
        return $this->checkX() && $this->checkY() && $this->checkR();
    }

    private function checkX() {
        return in_array($this->x, array(-2, -1.5, -1, -0.5, 0, 0.5, 1, 1.5, 2));
    }

    private function checkY() {
        return is_numeric($this->y) && ($this->y > -3 && $this->y < 5);
    }

    private function checkR() {
        return in_array($this->r, array(1, 1.5, 2, 2.5, 3));
    }
}
