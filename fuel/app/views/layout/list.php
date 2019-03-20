<h1><?php echo $title; ?></h1>
<p><?php echo $user; ?>さん、こんにちは。</p>

<?php
  echo $lists['first_name'];
 ?>
<br>
<table id="table">
  <tr>
    <th>姓</th>
    <th>名</th>
    <th>性別</th>
    <th>削除</th>
  </tr>
  <?php foreach($lists as $list): ?>
  <tr id="<?php echo $list['id'] ?>" class="tr">
    <td><?php echo $list['first_name']; ?></td>
    <td><?php echo $list['last_name']; ?></td>
    <td><?php echo $list['gender']; ?></td>
    <td><?php echo Form::checkbox('delete_flg', $list['id']); ?></td>
  </tr>
<?php endforeach ?>
</table>

<button type="button" name="button" id="delete_btn">削除反映</button>
