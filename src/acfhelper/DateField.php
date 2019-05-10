<?php

namespace ACFHelper;
class DateField extends AbstractField {
  protected $type = "date_picker";

  public $display_format = "Y/m/d";
  public $return_format = "Y-m-d";
  public $first_day = 1;

  public function dump( $parent_key ) {
    $arr1 = parent ::dump( $parent_key );
    $arr2 = [
      "display_format" => $this -> display_format,
      "return_format"  => $this -> return_format,
      "first_day"      => $this -> first_day,
    ];

    return array_merge( $arr1, $arr2 );
  }

  /**
   * @param $name
   * @param $label
   *
   * @return DateField
   */
  public function duplicate( $name, $label ) {
    $f = new DateField( $name, $label );
    $this -> paste_data( $f );

    return $f;
  }

  /**
   * @param DateField $target
   */
  protected function paste_data( $target ) {
    parent ::paste_data( $target );

    $target -> display_format = $this -> display_format;
    $target -> return_format  = $this -> return_format;
    $target -> first_day      = $this -> first_day;
  }
}
