<?php

namespace Hoge;

//class Model_Hoge extends \Model_Crud {
class Model_Hoge extends \Orm\Model {

  protected static $_table_name = 'form';

  protected static $_primary_key = array('id');

  public static function say_hello()
  {
      return "hello";
  }
}
