<?php

namespace ACFHelper;
class FieldGroup implements HasFields {
  const DISPLAY_ITEMS = [
    'the_content',
    'permalink',
    'excerpt',
    'custom_fields',
    'discussion',
    'comments',
    'revisions',
    'slug',
    'author',
    'format',
    'page_attributes',
    'featured_image',
    'categories',
    'tags',
    'send-trackbacks'
  ];

  public $key;
  public $title;
  public $location = [];
  public $menu_order = 0;
  public $position = "normal";

  public $hide_on_screen = [];
  /**
   * @var AbstractField[]
   */
  public $fields = [];

  public function __construct( $key, $title ) {
    $this -> key   = $key;
    $this -> title = $title;
  }

  public function add_location( $value, $param = "post_type", $operator = "==" ) {
    $this -> location[] = [
      [
        "param"    => $param,
        "operator" => $operator,
        "value"    => $value
      ]
    ];
  }

  public function &getFields() {
    return $this -> fields;
  }

  /**
   * @param $f AbstractField
   */
  public function addField( $f ) {
    $this -> fields[] = $f;
  }

  public function dump() {
    $fields = [];
    foreach ( $this -> fields as $field ) {
      $fields[] = $field -> dump( $this -> key );
    }

    return [
      'key'                   => $this -> key,
      'title'                 => $this -> title,
      'fields'                => $fields,
      'location'              => $this -> location,
      'menu_order'            => $this -> menu_order,
      'position'              => $this -> position,
      'style'                 => 'default',
      'label_placement'       => 'top',
      'instruction_placement' => 'label',
      'hide_on_screen'        => $this -> hide_on_screen,
      'active'                => 1,
      'description'           => '',
    ];
  }
}
