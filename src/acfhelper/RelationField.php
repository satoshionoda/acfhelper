<?php

namespace ACFHelper;
class RelationField extends AbstractField {
  protected $type = "relationship";

  public $post_type = [];
  public $taxonomy = [];
  public $filters = [];
  public $elements = "";
  public $min = "";
  public $max = "";
  public $return_object = "object";

  const FILTER_SEARCH = "search";
  const FILTER_POST_TYPE = "post_type";
  const FILTER_TAXONOMY = "taxonomy";

  public function dump($parent_key) {
    $arr1 = parent::dump($parent_key);
    $arr2 = [
      "post_type" => $this->post_type,
      "taxonomy" => $this->taxonomy,
      "filters" => $this->filters,
      "elements" => $this->elements,
      "min" => $this->min,
      "max" => $this->max,
      "return_object" => $this->return_object,
    ];

    return array_merge($arr1, $arr2);
  }

  /**
   * @param $name
   * @param $label
   *
   * @return RelationField
   */
  public function duplicate($name, $label) {
    $f = new RelationField($name, $label);
    $this->paste_data($f);

    return $f;
  }

  /**
   * @param RelationField $target
   */
  protected function paste_data($target) {
    parent::paste_data($target);

    $target->post_type = $this->post_type;
    $target->taxonomy = $this->taxonomy;
    $target->filters = $this->filters;
    $target->elements = $this->elements;
    $target->min = $this->min;
    $target->max = $this->max;
    $target->return_object = $this->return_object;
  }
}
