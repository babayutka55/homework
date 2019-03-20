<?php

class Controller_Layout extends Controller_Template
{

	public function before()
	{
		parent::before();

		$this->current_user = '+++';
	}

	public function action_index()
	{
		$this->template->set_global('title','レイアウト削除のサンプル');

		$data = array('user' => $this->current_user);

		$this->template->content = View::forge('layout/index',$data);
		$this->template->footer = View::forge('layout/footer');
	}

	public function action_list()
	{
		$this->template->set_global('title','レイアウト削除のサンプル');

		//db
		$lists = DB::insert('form')->set(array(
			'first_name' => Input::post('first_name'),
			'last_name' => Input::post('last_name'),
			'gender' => Input::post('gender'),
			'created_at' => 2019010101,
			'updated_at' => 2019191919,

		))->execute();
		$lists = DB::select('id','first_name','last_name','gender')->from('form')->execute();

		$data = array('user' => $this->current_user,'lists' => $lists);

		$this->template->content = View::forge('layout/list',$data);
		$this->template->footer = View::forge('layout/footer');
	}


	//バリデーションメソッド

}
