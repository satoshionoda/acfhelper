<?php

namespace ACFHelper;
class LayoutGroup extends AbstractField implements HasFields {
  protected $type = "group";

  const LAYOUT_BLOCK = "block";
  const LAYOUT_TABLE = "table";
  const LAYOUT_ROW = "row";

  public $layout = self::LAYOUT_TABLE;
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
      "layout"       => $this -> layout,
      "sub_fields"   => $subs
    ];

    return array_merge( $arr1, $arr2 );
  }


  /**
   * @param $name
   * @param $label
   *
   * @return LayoutGroup
   */
  public function duplicate( $name, $label ) {
    $f = new LayoutGroup( $name, $label );
    $this -> paste_data( $f );
    return $f;
  }

  /**
   * @param LayoutGroup $target
   */
  protected function paste_data( $target ) {
    parent ::paste_data( $target );
    $target -> layout       = $this -> layout;
    $target -> sub_fields   = $this -> sub_fields;
    //TODO: implement deep copy
  }
}
