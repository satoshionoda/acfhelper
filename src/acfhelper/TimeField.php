<?php

namespace ACFHelper;
class TimeField extends AbstractField {
  protected $type = "time_picker";

  public $display_format = "g:i a";
  public $return_format = "g:i a";

  public function dump( $parent_key ) {
    $arr1 = parent ::dump( $parent_key );
    $arr2 = [
      "display_format" => $this -> display_format,
      "return_format"  => $this -> return_format,
    ];

    return array_merge( $arr1, $arr2 );
  }

  /**
   * @param $name
   * @param $label
   *
   * @return TimeField
   */
  public function duplicate( $name, $label ) {
    $f = new TimeField( $name, $label );
    $this -> paste_data( $f );

    return $f;
  }

  /**
   * @param TimeField $target
   */
  protected function paste_data( $target ) {
    parent ::paste_data( $target );

    $target -> display_format = $this -> display_format;
    $target -> return_format  = $this -> return_format;
  }
}
