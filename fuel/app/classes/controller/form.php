<?php
class Controller_Form extends Controller_Rest
{

    protected $format = 'json';

    public function post_delete()
    {
      $ids = Input::post('ids');

      //送られてきたidsに該当する行を削除する処理
      $query = DB::delete('form')->where('id', 'in', $ids)->execute();
      $lists = DB::select('id','first_name','last_name','gender')->from('form')->execute();

      return $this->response(array(
          'ids' => $ids,
          'ai' => $ids[0],
          'lists' => $lists
      ));
    }
}
