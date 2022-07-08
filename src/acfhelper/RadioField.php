<?php

namespace ACFHelper;

class RadioField extends AbstractField {
  const LAYOUT_HORIZONTAL = "horizontal";
  const LAYOUT_VERTICAL = "vertical";

  protected $type = "radio";

  private $choices = [];
  public $allow_null = false;
  public $other_choice = false;
  public $save_other_choice = false;
  public $layout = self::LAYOUT_HORIZONTAL;
  public $return_format = "value";

  public function add_choice($key, $label) {
    $this->choices[$key] = $label;
  }

  public function dump($parent_key) {
    $arr1 = parent::dump($parent_key);
    $arr2 = [
      "choices" => $this->choices,
      "allow_null" => $this->allow_null,
      "other_choice" => $this->other_choice,
      "save_other_choice" => $this->save_other_choice,
      "layout" => $this->layout,
      "return_format" => $this->return_format,
    ];

    return array_merge($arr1, $arr2);
  }

  /**
   * @param $name string
   * @param $label string
   *
   * @return RadioField
   */
  public function duplicate($name, $label) {
    $f = new RadioField($name, $label);
    $this->paste_data($f);

    return $f;
  }

  /**
   * @param RadioField $target
   */
  protected function paste_data($target) {
    parent::paste_data($target);

    $target->choices = $this->choices;
    $target->allow_null = $this->allow_null;
    $target->other_choice = $this->other_choice;
    $target->save_other_choice = $this->save_other_choice;
    $target->layout = $this->layout;
    $target->return_format = $this->return_format;
  }
}
