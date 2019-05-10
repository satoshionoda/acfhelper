<?php

namespace ACFHelper;
class SelectField extends AbstractField {
  const LAYOUT_HORIZONTAL = "horizontal";
  const LAYOUT_VERTICAL = "vertical";

  protected $type = "select";

  private $choices = [];
  public $allow_null = false;
  public $multiple = false;
  public $ui = true;
  public $ajax = false;
  public $return_format = "value";

  public function add_choice( $key, $label ) {
    $this -> choices[ $key ] = $label;
  }

  public function dump( $parent_key ) {
    $arr1 = parent ::dump( $parent_key );
    $arr2 = [
      "choices"       => $this -> choices,
      "allow_null"    => $this -> allow_null,
      "multiple"      => $this -> multiple,
      "ui"            => $this -> ui,
      "ajax"          => $this -> ajax,
      "return_format" => $this -> return_format,
    ];

    return array_merge( $arr1, $arr2 );
  }

  /**
   * @param $name string
   * @param $label string
   *
   * @return SelectField
   */
  public function duplicate( $name, $label ) {
    $f = new SelectField( $name, $label );
    $this -> paste_data( $f );

    return $f;
  }

  /**
   * @param SelectField $target
   */
  protected function paste_data( $target ) {
    parent ::paste_data( $target );

    $target -> choices       = $this -> choices;
    $target -> allow_null    = $this -> allow_null;
    $target -> multiple      = $this -> multiple;
    $target -> ui            = $this -> ui;
    $target -> ajax          = $this -> ajax;
    $target -> return_format = $this -> return_format;
  }
}
