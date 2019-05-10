<?php

namespace ACFHelper;
class ImageField extends AbstractField {
  const SIZE_MEDIUM = "medium";

  protected $type = "image";

  public $return_format = "array";
  public $preview_size = "thumbnail";
  public $library = "all";
  public $min_width = 0;
  public $min_height = 0;
  public $max_width = 0;
  public $max_height = 0;
  public $min_size = 0;
  public $max_size = 0;
  public $mime_types = "";

  public function dump( $parent_key ) {
    $arr1 = parent ::dump( $parent_key );
    $arr2 = [
      "return_format" => $this -> return_format,
      "preview_size"  => $this -> preview_size,
      "library"       => $this -> library,
      "min_width"     => $this -> min_width,
      "min_height"    => $this -> min_height,
      "max_width"     => $this -> max_width,
      "max_height"    => $this -> max_height,
      "min_size"      => $this -> min_size,
      "max_size"      => $this -> max_size,
      "mime_types"    => $this -> mime_types,
    ];

    return array_merge( $arr1, $arr2 );
  }


  /**
   * @param $name
   * @param $label
   *
   * @return ImageField
   */
  public function duplicate( $name, $label ) {
    $f = new ImageField( $name, $label );
    $this -> paste_data( $f );
    return $f;
  }

  /**
   * @param ImageField $target
   */
  protected function paste_data( $target ) {
    parent ::paste_data( $target );

    $target -> return_format = $this -> return_format;
    $target -> preview_size  = $this -> preview_size;
    $target -> library       = $this -> library;
    $target -> min_width     = $this -> min_width;
    $target -> min_height    = $this -> min_height;
    $target -> max_width     = $this -> max_width;
    $target -> max_height    = $this -> max_height;
    $target -> min_size      = $this -> min_size;
    $target -> max_size      = $this -> max_size;
    $target -> mime_types    = $this -> mime_types;

  }
}
