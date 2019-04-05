<?php
class Controller_Form extends Controller_Rest
{

    protected $format = 'json';

    public function post_delete()
    {
      $delete_ids = Input::post('delete_ids');
      if(!isset($delete_ids)){
        return;
      }

      //送られてきたidsに該当する行を削除する処理
      $query = DB::delete('form')->where('id', 'in', $delete_ids)->execute();
      $lists = DB::select('id','first_name','last_name','gender')
                      ->from('form')
                      ->where('id','in',Input::post('id_all'))
                      ->order_by( 'id', 'desc' )
                      ->execute();

      return $this->response(array(
          //'ids' => $delete_ids,
          //'ai' => $ids[0],
          'lists' => $lists
      ));
    }

    public function post_update()
    {
      $result = DB::update('form')
                        ->set(array(
                          'first_name' => Input::post('first_name'),
                          'last_name' => Input::post('last_name'),
                          'gender' => Input::post('gender')
                        ))
                        ->where('id', Input::post('id'))
                        ->execute();
      $result = DB::select('id','first_name','last_name','gender')
                        ->from('form')
                        ->where('id',Input::post('id'))
                        ->execute();

      return $this->response(array(
          'result' => $result,
      ));
    }

    public function post_update2()
    {

      //バリデーション
  		/*$val = $this->forge_validation();
  		if(!$val->run()){
  			//問題あり
        return $this->response(array(
          'result' => 'failed'
        ));
  		}*/
      $json_result = $this->forge_validation2();

      /*$result = Model_Form::find_by_pk(Input::post('id'));
      $result->set(array(
          'first_name'  => Input::post('first_name'),
          'last_name' => Input::post('last_name'),
          'gender' => Input::post('gender'),
          'created_at' => '1',
          'updated_at' => '1',
      ));
      $result->save();
      */
      $result = null;

      if($json_result['res'] === 'OK'){

        $result = Model_Form::find_by_pk(Input::post('id'));
        $result->set(array(
            'first_name'  => Input::post('first_name'),
            'last_name' => Input::post('last_name'),
            'gender' => Input::post('gender'),
            'created_at' => '1',
            'updated_at' => '1',
        ));
        $result->save();
      }


      return $this->response(array(
        'result' => $result,
        'json_result' => $json_result
      ));
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

    //バリデーションメソッド
  	public function forge_validation2()
  	{
      // json初期値
      $json = array(
          'res'   => 'NG',
          'error' => array(),
      );

      // バリデーション設定
      $val = Validation::forge();
      $val->add_field('first_name', '姓', 'trim|required|max_length[10]');
      $val->add_field('last_name', '名', 'trim|required|max_length[10]');
      $val->add_field('gender', '性別', 'trim|required|max_length[10]');

      // バリデーションチェック
      if ( $val->run() )
      {
          $json['res'] = 'OK';
      }
      else
      {
          $errors = $val->error();
          foreach( $errors as $field => $error )
          {
              $json['error'][$field] = $error->get_message();
          }
      }

      //$this->response($json);
      return $json;
  	}

}
