<?php

namespace Hoge;

use Hoge\Model\Model_Hoge;

class Controller_Hoge extends \Controller_Template
{

  public $template = 'hoge::hogetemplate';

  public function before()
  {
    parent::before();

    $this->template->header = \View::forge('hoge::header');
    //$this->template->content = \View::forge('layout/footer');
    $this->template->footer = \View::forge('hoge::footer');
  }

  public function action_index()
  {
    $data = array(
      'sample' => 'sample',
    );

    $this->template->content = \View::forge('hoge::content',$data);
  }

  public function action_test()
  {

  }
}
