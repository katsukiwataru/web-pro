<?php
  // クラスの演習
  //
  // 下記の特徴をもつクラスを定義してください
  // - 電卓を表す
  // - 2つの数値(a, b)を内部に持つことができる
  // - 足し算(a + b)を行うメソッドを持つ
  // - 引き算(a - b)を行うメソッドを持つ
  // - 掛け算(a * b)を行うメソッドを持つ
  // - 割り算(a / b)を行うメソッドを持つ

  class Calculator {
    public $a;
    public $b;

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
