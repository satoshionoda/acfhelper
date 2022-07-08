<?php

namespace ACFHelper;
class TabField extends AbstractField {
  protected $type = "tab";

  public $placement = "top";
  public $endpoint = false;

  public function dump($parent_key) {
    $arr1 = parent::dump($parent_key);
    $arr2 = [
      "placement" => $this->placement,
      "endpoint" => $this->endpoint,
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
    $f = new TabField($name, $label);
    $this->paste_data($f);

    return $f;
  }

  /**
   * @param TabField $target
   */
  protected function paste_data($target) {
    parent::paste_data($target);
    $target->placement = $this->placement;
    $target->endpoint = $this->endpoint;
  }
}
