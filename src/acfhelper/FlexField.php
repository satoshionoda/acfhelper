<?php

namespace ACFHelper;
class FlexField extends AbstractField implements HasFields {
  protected $type = "flexible_content";

  public $min = 0;
  public $max = 0;
  public $button_label;

  /**
   * @var FlexChild[]
   */
  private $layouts = [];

  function &getFields() {
    return $this->layouts;
  }

  public function dump($parent_key) {
    $subs = [];
    foreach ($this->layouts as $sub) {
      $dumped = $sub->dump($parent_key . "_" . $this->name);
      $subs[$dumped["key"]] = $dumped;
    }

    $arr1 = parent::dump($parent_key);
    $arr2 = [
      "min" => $this->min,
      "max" => $this->max,
      "button_label" => $this->button_label,
      "layouts" => $subs,
    ];

    return array_merge($arr1, $arr2);
  }

  /**
   * @param $name
   * @param $label
   *
   * @return FlexField
   */
  public function duplicate($name, $label) {
    $f = new FlexField($name, $label);
    $this->paste_data($f);

    return $f;
  }

  /**
   * @param FlexField $target
   */
  protected function paste_data($target) {
    parent::paste_data($target);
    $target->min = $this->min;
    $target->max = $this->max;
    $target->button_label = $this->button_label;
    $target->layouts = $this->layouts;
    //TODO: implement deep copy
  }
}
