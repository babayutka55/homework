<h1><?php echo $title; ?></h1>
<p><?php echo $user; ?>さん、こんにちは。</p>

<?php echo Form::open('layout/list'); ?>
  <p>
    <?php echo Form::label('姓','first_name'); ?>
    <?php echo Form::input('first_name',Input::post('first_name')); ?>
  </p>
  <p>
    <?php echo Form::label('名','last_name'); ?>
    <?php echo Form::input('last_name',Input::post('last_name')); ?>
  </p>
  <p>
    <?php

    echo Form::label('Male', 'gender');
    echo Form::radio('gender', 'Male', true);
    echo Form::label('Female', 'gender');
    echo Form::radio('gender', 'Female');
    ?>
  </p>
  <p>
    <?php echo Form::input('send','送信',array('class'=>'btn','type'=>'submit')); ?>
  </p>
<?php echo Form::close(); ?>
