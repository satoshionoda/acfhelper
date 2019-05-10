<?php

namespace ACFHelper;
class TextField extends AbstractField {
  protected $type = "text";

  public $placeholder = "";
  public $prepend = "";
  public $append = "";
  public $maxlength = "";
  public $readonly = false;
  public $disabled = 0;

  public function dump( $parent_key ) {
    $arr1 = parent ::dump( $parent_key );
    $arr2 = [
      "placeholder" => $this -> placeholder,
      "prepend"     => $this -> prepend,
      "append"      => $this -> append,
      "maxlength"   => $this -> maxlength,
      "readonly"    => $this -> readonly,
      "disabled"    => $this -> disabled,
    ];

    return array_merge( $arr1, $arr2 );
  }

  /**
   * @param $name
   * @param $label
   *
   * @return AbstractField
   */
  public function duplicate( $name, $label ) {
    $f = new TextField( $name, $label );
    $this -> paste_data( $f );

    return $f;
  }

  /**
   * @param TextField $target
   */
  protected function paste_data( $target ) {
    parent ::paste_data( $target );

    $target -> placeholder = $this -> placeholder;
    $target -> prepend     = $this -> prepend;
    $target -> append      = $this -> append;
    $target -> maxlength   = $this -> maxlength;
    $target -> readonly    = $this -> readonly;
    $target -> disabled    = $this -> disabled;
  }
}
