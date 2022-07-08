<?php

namespace ACFHelper;
class FieldGroup implements HasFields {
  static function makeHideItemsArray(...$items): array {
    return array_filter(self::DISPLAY_ITEMS, function ($var) use ($items) {
      return array_search($var, $items) === false;
    });
  }

  const UI_THE_CONTENT = "the_content";
  const UI_PERMALINK = "permalink";
  const UI_EXCERPT = "excerpt";
  const UI_CUSTOM_FIELDS = "custom_fields";
  const UI_DISCUSSION = "discussion";
  const UI_COMMENTS = "comments";
  const UI_REVISIONS = "revisions";
  const UI_SLUG = "slug";
  const UI_AUTHOR = "author";
  const UI_FORMAT = "format";
  const UI_PAGE_ATTRIBUTES = "page_attributes";
  const UI_FEATURED_IMAGE = "featured_image";
  const UI_CATEGORIES = "categories";
  const UI_TAGS = "tags";
  const UI_SEND_TRACKBACKS = "send-trackbacks";

  private const DISPLAY_ITEMS = [
    self::UI_THE_CONTENT,
    self::UI_PERMALINK,
    self::UI_EXCERPT,
    self::UI_CUSTOM_FIELDS,
    self::UI_DISCUSSION,
    self::UI_COMMENTS,
    self::UI_REVISIONS,
    self::UI_SLUG,
    self::UI_AUTHOR,
    self::UI_FORMAT,
    self::UI_PAGE_ATTRIBUTES,
    self::UI_FEATURED_IMAGE,
    self::UI_CATEGORIES,
    self::UI_TAGS,
    self::UI_SEND_TRACKBACKS,
  ];

  const STYLE_DEFAULT = "default";
  const STYLE_SEAMLESS = "seamless";

  public $key;
  public $title;
  public $location = [];
  public $menu_order = 0;
  public $position = "normal";
  public $style = self::STYLE_DEFAULT;

  public $hide_on_screen = [];
  /**
   * @var AbstractField[]
   */
  public $fields = [];

  public function __construct($key, $title) {
    $this->key = $key;
    $this->title = $title;
  }

  public function add_location($value, $param = "post_type", $operator = "==") {
    $this->location[] = [
      [
        "param" => $param,
        "operator" => $operator,
        "value" => $value,
      ],
    ];
  }

  public function &getFields() {
    return $this->fields;
  }

  /**
   * @param $f AbstractField
   */
  public function addField($f) {
    $this->fields[] = $f;
  }

  public function dump($graphql_name = "") {
    $fields = [];
    foreach ($this->fields as $field) {
      $fields[] = $field->dump($this->key);
    }

    $arr = [
      "key" => $this->key,
      "title" => $this->title,
      "fields" => $fields,
      "location" => $this->location,
      "menu_order" => $this->menu_order,
      "position" => $this->position,
      "style" => $this->style,
      "label_placement" => "top",
      "instruction_placement" => "label",
      "hide_on_screen" => $this->hide_on_screen,
      "active" => 1,
      "description" => "",
      "show_in_rest" => 0,
      "show_in_graphql" => 1,
      "graphql_field_name" => "test",
      "map_graphql_types_from_location_rules" => 0,
      "graphql_types" => "",
    ];

    if ($graphql_name !== "") {
      $arr["show_in_graphql"] = 1;
      $arr["graphql_field_name"] = $graphql_name;
      $arr["map_graphql_types_from_location_rules"] = 0;
      $arr["graphql_types"] = "";
    }

    return $arr;
  }
}
