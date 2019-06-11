<?php
  class calc {
    public $a;
    public $b;
    public $c;

    function add() {
      return $this->a + $this->b;
    }
    function sub() {
      return $this->a - $this->b;
    }
    function mul() {
      return $this->a * $this->b;
    }
    function div() {
      return $this->a / $this->b;
    }
  }
