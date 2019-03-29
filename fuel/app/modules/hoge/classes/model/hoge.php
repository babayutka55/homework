<?php

namespace Hoge;

class Model_Hoge extends \Model_Crud {

  protected static $_table_name = 'form';

  protected static $_primary_key = 'id';

  public static function say_hello()
  {
      return "hello";
  }
}
