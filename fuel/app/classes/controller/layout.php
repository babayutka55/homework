<?php

class Controller_Layout extends Controller_Template
{

	public function before()
	{
		parent::before();

		$this->current_user = '+++';
		$this->template->footer = View::forge('layout/footer');
	}

	//入力画面
	public function action_index()
	{
		$this->template->set_global('title','入力画面');

		$data = array('user' => $this->current_user);

		$this->template->content = View::forge('layout/index',$data);
	}

	public function action_list()
	{
		$this->template->set_global('title','一覧画面');

		//バリデーション
		$val = $this->forge_validation();
		if(!$val->run()){
			//問題あり
			$lists = DB::select('id','first_name','last_name','gender')->from('form')->execute();
			$data = array('user' => $this->current_user,'lists' => $lists);

			$this->template->title = 'エラー';
			$this->template->content = View::forge('layout/index',$data);

			$this->template->content->set_safe('html_error',$val->show_errors());

			return;
		}

		//db更新
		$lists = DB::insert('form')->set(array(
			'first_name' => Input::post('first_name'),
			'last_name' => Input::post('last_name'),
			'gender' => Input::post('gender'),
			'created_at' => 2019010101,
			'updated_at' => 2019191919,
		))->execute();

		//listsを取得、viewへ渡す用
		$pagination = $this->createPaginationObject();
		$lists = DB::select('id','first_name','last_name','gender')
		                            ->from('form')
		                            ->limit($pagination->per_page)
		                            ->offset($pagination->offset)
		                            ->execute()
		                            ->as_array();

		$data = array('user' => $this->current_user,'lists' => $lists);

		$this->template->content = View::forge('layout/list',$data);
		$this->template->footer = View::forge('layout/footer');
	}

	//直接一覧画面にアクセスした時
	public function action_direct_list()
	{
		$page = Input::get('page');
		$page = isset($page)?'page番号'.Input::get('page'):'デフォルト';//数字かどうかのチェック必要

		$this->template->set_global('title',$page);

		//listsを取得、viewへ渡す用
		$pagination = $this->createPaginationObject();
		$lists = DB::select('id','first_name','last_name','gender')
		                            ->from('form')
		                            ->limit($pagination->per_page)
		                            ->offset($pagination->offset)
		                            ->execute()
		                            ->as_array();

		//viewへ渡すもの
		$data = array('user' => $this->current_user,'lists' => $lists);


		$this->template->content = View::forge('layout/list',$data);
	}

	//バリデーションメソッド
	public function forge_validation()
	{
		$val = Validation::forge();

		$val->add('first_name','姓')
				->add_rule('trim')
				->add_rule('required')
				->add_rule('max_length',10);

		$val->add('last_name','名')
				->add_rule('trim')
				->add_rule('required')
				->add_rule('max_length',10);

		$val->add('gender','性別')
				->add_rule('trim')
				->add_rule('required')
				->add_rule('max_length',10);

		return $val;
	}

	//pagination切り離し
	public function createPaginationObject()
	{
		$config = array(
		    'pagination_url' => Uri::base().'layout/direct_list',
		    'total_items'    => DB::count_records('form'),
		    'per_page'       => 5,
		    'uri_segment'    => 3,
		    //クエリ文字列
		    'uri_segment'    => 'page',
		);

		// 'mypagination' という名前の pagination インスタンスを作る
		$pagination = Pagination::forge('mypagination', $config);

		return $pagination;
	}

}
