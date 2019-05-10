<?php

namespace ACFHelper;
class TextAreaField extends AbstractField {
  protected $type = "textarea";

  const NEW_LINES_AUTOP = "wpautop";
  const NEW_LINES_BR = "br";
  const NEW_LINES_NO = "";

  public $placeholder = "";
  public $maxlength = "";
  public $rows = 4;
  public $new_lines = self::NEW_LINES_NO;
  public $readonly = false;
  public $disabled = 0;

  public function dump( $parent_key ) {
    $arr1 = parent ::dump( $parent_key );
    $arr2 = [
      "placeholder" => $this -> placeholder,
      "maxlength"   => $this -> maxlength,
      "rows"        => $this -> rows,
      "new_lines"   => $this -> new_lines,
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
    $f = new TextAreaField( $name, $label );
    $this -> paste_data( $f );

    return $f;
  }

  /**
   * @param TextAreaField $target
   */
  protected function paste_data( $target ) {
    parent ::paste_data( $target );

    $target -> placeholder = $this -> placeholder;
    $target -> maxlength   = $this -> maxlength;
    $target -> rows        = $this -> rows;
    $target -> new_lines   = $this -> new_lines;
    $target -> readonly    = $this -> readonly;
    $target -> disabled    = $this -> disabled;
  }

}


