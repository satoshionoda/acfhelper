<?php

namespace ACFHelper;
class MessageField extends AbstractField {
  protected $type = "message";

  const NEW_LINES_AUTOP = "wpautop";
  const NEW_LINES_BR = "br";
  const NEW_LINES_NO = "";

  public $new_lines = self::NEW_LINES_NO;
  public $message = "";
  public $esc_html = false;

  public function dump( $parent_key ) {
    $arr1 = parent ::dump( $parent_key );
    $arr2 = [
      "new_lines" => $this -> new_lines,
      "message"   => $this -> message,
      "esc_html"  => $this -> esc_html,
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
    $f = new MessageField( $name, $label );
    $this -> paste_data( $f );

    return $f;
  }

  /**
   * @param MessageField $target
   */
  protected function paste_data( $target ) {
    parent ::paste_data( $target );

    $target -> new_lines = $this -> new_lines;
    $target -> message   = $this -> message;
    $target -> esc_html  = $this -> esc_html;
  }

}


