<?php

namespace ACFHelper;
class TaxonomyField extends AbstractField {

  protected $type = "taxonomy";
  const FIELD_CHECKBOX = "checkbox";
  const FIELD_MULTIPLE = "multi_select";
  const FIELD_RADIO = "radio";
  const FIELD_SELECT = "select";

  const FORMAT_OBJECT = "object";
  const FORMAT_ID = "id";
  /**
   * @var string
   */
  public $taxonomy = "";

  public $field_type = TaxonomyField::FIELD_CHECKBOX;
  public $allow_null = false;
  public $add_term = true;
  public $save_terms = false;
  public $load_terms = false;
  public $return_format = TaxonomyField::FORMAT_OBJECT;
  public $multiple = false;


  public function dump( $parent_key ) {
    $arr1 = parent ::dump( $parent_key );
    $arr2 = [
      "field_type"    => $this -> field_type,
      "allow_null"    => $this -> allow_null,
      "add_term"      => $this -> add_term,
      "save_terms"    => $this -> save_terms,
      "load_terms"    => $this -> load_terms,
      "return_format" => $this -> return_format,
      "multiple"      => $this -> multiple,
    ];

    return array_merge( $arr1, $arr2 );
  }

  /**
   * @param $name string
   * @param $label string
   *
   * @return TaxonomyField
   */
  public function duplicate( $name, $label ) {
    $f = new TaxonomyField( $name, $label );
    $this -> paste_data( $f );

    return $f;
  }


  /**
   * @param TaxonomyField $target
   */
  protected function paste_data( $target ) {
    parent ::paste_data( $target );
    $target -> field_type    = $this -> field_type;
    $target -> allow_null    = $this -> allow_null;
    $target -> add_term      = $this -> add_term;
    $target -> save_terms    = $this -> save_terms;
    $target -> load_terms    = $this -> load_terms;
    $target -> return_format = $this -> return_format;
    $target -> multiple      = $this -> multiple;
  }
}
