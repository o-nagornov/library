<?php
return array (
  'user' => 
  array (
    'type' => 2,
    'description' => '',
    'bizRule' => NULL,
    'data' => NULL,
    'assignments' => 
    array (
      3 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
    ),
  ),
  'admin' => 
  array (
    'type' => 2,
    'description' => '',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'user',
    ),
    'assignments' => 
    array (
      2 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
    ),
  ),
  'root' => 
  array (
    'type' => 2,
    'description' => '',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'admin',
    ),
    'assignments' => 
    array (
      1 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
    ),
  ),
);
