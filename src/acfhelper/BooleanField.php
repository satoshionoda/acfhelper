<?php

namespace ACFHelper;
class BooleanField extends AbstractField {
  protected $type = "true_false";
  /**
   * @var bool
   */
  public $ui = true;
  /**
   * @var string
   */
  public $ui_on_text = "表示";
  /**
   * @var string
   */
  public $ui_off_text = "非表示";

  public function dump($parent_key) {
    $arr1 = parent::dump($parent_key);
    $arr2 = [
      "ui" => $this->ui,
      "ui_on_text" => $this->ui_on_text,
      "ui_off_text" => $this->ui_off_text,
    ];

    return array_merge($arr1, $arr2);
  }

  /**
   * @param $name
   * @param $label
   *
   * @return BooleanField
   */

  public function duplicate($name, $label) {
    $f = new BooleanField($name, $label);
    $this->paste_data($f);

    return $f;
  }

  /**
   * @param BooleanField $target
   */
  protected function paste_data($target) {
    parent::paste_data($target);
    $target->ui = $this->ui;
    $target->ui_on_text = $this->ui_on_text;
    $target->ui_off_text = $this->ui_off_text;
  }
}
