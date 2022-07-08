<?php

namespace ACFHelper;
class FlexChild extends AbstractField implements HasFields {
  protected $type = "";

  const DISPLAY_BLOCK = "block";
  const DISPLAY_TABLE = "table";
  const DISPLAY_ROW = "row";

  public $min = 0;
  public $max = 0;
  public $display = self::DISPLAY_BLOCK;

  /**
   * @var AbstractField[]
   */
  private $sub_fields = [];

  function &getFields() {
    return $this->sub_fields;
  }

  public function dump($parent_key) {
    $subs = [];
    foreach ($this->sub_fields as $sub) {
      $subs[] = $sub->dump($parent_key . "_" . $this->name);
    }

    $arr1 = parent::dump($parent_key);
    $arr2 = [
      "min" => $this->min,
      "max" => $this->max,
      "display" => $this->display,
      "sub_fields" => $subs,
    ];

    return array_merge($arr1, $arr2);
  }

  /**
   * @param $name
   * @param $label
   *
   * @return FlexChild
   */
  public function duplicate($name, $label) {
    $f = new FlexChild($name, $label);
    $this->paste_data($f);

    return $f;
  }

  /**
   * @param FlexChild $target
   */
  protected function paste_data($target) {
    parent::paste_data($target);
    $target->min = $this->min;
    $target->max = $this->max;
    $target->display = $this->display;
    $target->sub_fields = $this->sub_fields;
    //TODO: implement deep copy
  }
}
