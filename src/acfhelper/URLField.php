<?php

namespace ACFHelper;
class URLField extends AbstractField {
  protected $type = "text";

  public $placeholder = "";

  public function dump( $parent_key ) {
    $arr1 = parent ::dump( $parent_key );
    $arr2 = [
      "placeholder" => $this -> placeholder,
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
  }
}
