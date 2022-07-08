<?php

namespace ACFHelper;

abstract class AbstractField {
  /**
   * @var string
   */
  public $label = "";
  /**
   * @var string
   */
  public $name = "";
  /**
   * @var string
   */
  protected $type = "";
  /**
   * @var string
   */
  public $instructions = "";
  /**
   * @var bool
   */
  public $required = false;

  public $conditional_logic = [];
  /**
   * @var string
   */
  public $wrapper_class = "";
  /**
   * @var string
   */
  public $wrapper_width = "";
  /**
   * @var string
   */
  public $wrapper_id = "";
  /**
   * @var
   */
  public $default_value;

  public function __construct($name, $label) {
    $this->name = $name;
    $this->label = $label;
  }

  /**
   * @param $fields HasFields
   */
  public function insert_to($fields) {
    $fields->getFields()[] = $this;
  }

  public function dump($parent_key) {
    return [
      "key" => $parent_key . "_" . $this->name,
      "label" => $this->label,
      "name" => $this->name,
      "type" => $this->type,
      "instructions" => $this->instructions,
      "required" => $this->required,
      "conditional_logic" => $this->conditional_logic,
      "wrapper" => [
        "width" => $this->wrapper_width,
        "class" => $this->wrapper_class,
        "id" => $this->wrapper_id,
      ],
      "default_value" => $this->default_value,
    ];
  }

  /**
   * @param $target AbstractField
   */
  protected function paste_data($target) {
    $target->type = $this->type;
    $target->instructions = $this->instructions;
    $target->required = $this->required;
    $target->conditional_logic = $this->conditional_logic;
    $target->wrapper_width = $this->wrapper_width;
    $target->wrapper_class = $this->wrapper_class;
    $target->wrapper_id = $this->wrapper_id;
    $target->default_value = $this->default_value;
  }

  /**
   * @param $name string
   * @param $label string
   *
   * @return AbstractField
   */
  abstract public function duplicate($name, $label);
}
