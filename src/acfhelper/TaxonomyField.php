<?php

namespace ACFHelper;
class TaxonomyField extends AbstractField {
  protected $type = "taxonomy";

  const TYPE_CHECKBOX = "checkbox";
  const TYPE_MULTI_SELECT = "multi_select";
  const TYPE_RADIO = "radio";
  const TYPE_SINGLE_SELECT = "select";

  public string $taxonomy = "";
  public string $field_type = self::TYPE_SINGLE_SELECT;
  public bool $allow_null = false;
  public bool $add_term = false;
  public bool $save_terms = true;
  public bool $load_terms = true;
  public string $return_format = "object";

  public function dump($parent_key) {
    $arr1 = parent::dump($parent_key);
    $arr2 = [
      "taxonomy" => $this->taxonomy,
      "field_type" => $this->field_type,
      "allow_null" => $this->allow_null,
      "add_term" => $this->add_term,
      "save_terms" => $this->save_terms,
      "load_terms" => $this->load_terms,
      "return_format" => $this->return_format,
    ];

    return array_merge($arr1, $arr2);
  }

  /**
   * @param $name
   * @param $label
   *
   * @return TaxonomyField
   */
  public function duplicate($name, $label) {
    $f = new TaxonomyField($name, $label);
    $this->paste_data($f);

    return $f;
  }

  /**
   * @param TaxonomyField $target
   */
  protected function paste_data($target) {
    parent::paste_data($target);
    $target->taxonomy = $this->taxonomy;
    $target->field_type = $this->field_type;
    $target->allow_null = $this->allow_null;
    $target->add_term = $this->add_term;
    $target->save_terms = $this->save_terms;
    $target->load_terms = $this->load_terms;
    $target->return_format = $this->return_format;
  }
}
