<?php

namespace ACFHelper;
class NumberField extends AbstractField {
  protected $type = "number";

  public $placeholder = "";
  public $prepend = "";
  public $append = "";
  public $min = 0;
  public $max = 9999;
  public $step = 1;

  public function dump($parent_key) {
    $arr1 = parent::dump($parent_key);
    $arr2 = [
      "placeholder" => $this->placeholder,
      "prepend" => $this->prepend,
      "append" => $this->append,
      "min" => $this->min,
      "max" => $this->max,
      "step" => $this->step,
    ];

    return array_merge($arr1, $arr2);
  }

  /**
   * @param $name
   * @param $label
   *
   * @return NumberField
   */
  public function duplicate($name, $label) {
    $f = new NumberField($name, $label);
    $this->paste_data($f);

    return $f;
  }

  /**
   * @param NumberField $target
   */
  protected function paste_data($target) {
    parent::paste_data($target);

    $target->placeholder = $this->placeholder;
    $target->prepend = $this->prepend;
    $target->append = $this->append;
    $target->min = $this->min;
    $target->max = $this->max;
    $target->step = $this->step;
  }
}
