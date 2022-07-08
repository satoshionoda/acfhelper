<?php

namespace ACFHelper;
class URLField extends AbstractField {
  protected $type = "url";

  public $placeholder = "";

  public function dump($parent_key) {
    $arr1 = parent::dump($parent_key);
    $arr2 = [
      "placeholder" => $this->placeholder,
    ];

    return array_merge($arr1, $arr2);
  }

  /**
   * @param $name
   * @param $label
   *
   * @return AbstractField
   */
  public function duplicate($name, $label) {
    $f = new URLField($name, $label);
    $this->paste_data($f);

    return $f;
  }

  /**
   * @param URLField $target
   */
  protected function paste_data($target) {
    parent::paste_data($target);

    $target->placeholder = $this->placeholder;
  }
}
