<?php

namespace ACFHelper;
class PostField extends AbstractField {
  protected $type = "post_object";

  /**
   * @var string[]
   */
  public $post_type = [];
  public $taxonomy = [];
  public $allow_null = false;
  public $multiple = false;
  public $return_format = "object";
  public $ui = true;

  public function dump( $parent_key ) {
    $arr1 = parent ::dump( $parent_key );
    $arr2 = [
      "post_type"     => $this -> post_type,
      "taxonomy"      => $this -> taxonomy,
      "allow_null"    => $this -> allow_null,
      "multiple"      => $this -> multiple,
      "return_format" => $this -> return_format,
      "ui"            => $this -> ui,
    ];

    return array_merge( $arr1, $arr2 );
  }


  /**
   * @param $name
   * @param $label
   *
   * @return PostField
   */

  public function duplicate( $name, $label ) {
    $f = new PostField( $name, $label );
    $this -> paste_data( $f );

    return $f;
  }

  /**
   * @param PostField $target
   */
  protected function paste_data( $target ) {
    parent ::paste_data( $target );
    $target -> post_type     = $this -> post_type;
    $target -> taxonomy      = $this -> taxonomy;
    $target -> allow_null    = $this -> allow_null;
    $target -> multiple      = $this -> multiple;
    $target -> return_format = $this -> return_format;
    $target -> ui            = $this -> ui;
  }
}
