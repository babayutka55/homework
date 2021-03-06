<h1><?php echo $title; ?></h1>
<p><?php echo $user; ?>さん、こんにちは。</p>

<br>
<table id="table">
  <tr>
    <th>編集</th>
    <th>id</th>
    <th>姓</th>
    <th>名</th>
    <th>性別</th>
    <th>削除</th>
  </tr>
  <?php foreach($lists as $list): ?>
  <tr id="<?php echo $list['id'] ?>" class="tr">
    <td class="btn-modal"><button>編集</button></td>
    <td class="user_id"><?php echo $list['id']; ?></td>
    <td><?php echo $list['first_name']; ?></td>
    <td><?php echo $list['last_name']; ?></td>
    <td><?php echo $list['gender']; ?></td>
    <td><?php echo Form::checkbox('delete_flg', $list['id']); ?></td>
  </tr>
<?php endforeach ?>
</table>
<?php echo Pagination::instance('mypagination')->render(); ?>

<button type="button" name="button" id="delete_btn">削除反映</button>
<!--モーダル-->
<div class="overlay" id="overlay"></div>
<div class="modal" id="modal">
  <button class="modal-close-btn" id="close-btn"><i class="fa fa-times" title="閉じる"></i></button>
  <h1>詳細</h1>
  <table>
    <tr>
      <th>id</th>
      <th>姓</th>
      <th>名</th>
      <th>性別</th>
    </tr>
    <tr>
      <td><div id="modal_id"></div></td>
      <td><input type="text" value="" id="modal_first_name"></td>
      <td><input type="text" value="" id="modal_last_name"></td>
      <td><input type="text" value="" id="modal_gender"></td>
    </tr>
  </table>
  <button type="button" name="button" id="modal_change_button">変更</button>
</div>
<button class="btn" id="btn-modal">開く</button><?php echo $_SERVER['SERVER_NAME']; ?>
