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
}
