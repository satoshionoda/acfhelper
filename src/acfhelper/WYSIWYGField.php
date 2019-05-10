<?php

namespace ACFHelper;
class WYSISYGField extends AbstractField {
  protected $type = "wysiwyg";

  public $tabs = "all";
  public $toolbar = "basic";
  public $media_upload = false;
  public $delay = false;

  public function dump( $parent_key ) {
    $arr1 = parent ::dump( $parent_key );
    $arr2 = [
      "tabs"         => $this -> tabs,
      "toolbar"      => $this -> toolbar,
      "media_upload" => $this -> media_upload,
    ];

    return array_merge( $arr1, $arr2 );
  }


  /**
   * @param $name
   * @param $label
   *
   * @return WYSISYGField
   */

  public function duplicate( $name, $label ) {
    $f = new WYSISYGField( $name, $label );
    $this -> paste_data( $f );

    return $f;
  }

  /**
   * @param WYSISYGField $target
   */
  protected function paste_data( $target ) {
    parent ::paste_data( $target );
    $target -> tabs         = $this -> tabs;
    $target -> toolbar      = $this -> toolbar;
    $target -> media_upload = $this -> media_upload;
  }
}
