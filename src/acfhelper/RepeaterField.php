<?php

namespace ACFHelper;
class RepeaterField extends AbstractField implements HasFields {
  protected $type = "repeater";

  const LAYOUT_BLOCK = "block";
  const LAYOUT_TABLE = "table";
  const LAYOUT_ROW = "row";

  public $collapsed = "";
  public $min = 0;
  public $max = 0;
  public $layout = self::LAYOUT_BLOCK;
  public $button_label = "";
  /**
   * @var AbstractField[]
   */
  private $sub_fields = [];


  function &getFields() {
    return $this->sub_fields;
  }

  public function dump( $parent_key ) {
    $subs = [];
    foreach ( $this -> sub_fields as $sub ) {
      $subs[] = $sub -> dump( $parent_key . "_" . $this -> name );
    }

    $arr1 = parent ::dump( $parent_key );
    $arr2 = [
      "collapsed"    => $this -> collapsed,
      "min"          => $this -> min,
      "max"          => $this -> max,
      "layout"       => $this -> layout,
      "button_label" => $this -> button_label,
      "sub_fields"   => $subs
    ];

    return array_merge( $arr1, $arr2 );
  }


  /**
   * @param $name
   * @param $label
   *
   * @return RepeaterField
   */
  public function duplicate( $name, $label ) {
    $f = new RepeaterField( $name, $label );
    $this -> paste_data( $f );
    return $f;
  }

  /**
   * @param RepeaterField $target
   */
  protected function paste_data( $target ) {
    parent ::paste_data( $target );
    $target -> collapsed    = $this -> collapsed;
    $target -> min          = $this -> min;
    $target -> max          = $this -> max;
    $target -> layout       = $this -> layout;
    $target -> button_label = $this -> button_label;
    $target -> sub_fields   = $this -> sub_fields;
    //TODO: implement deep copy
  }
}
