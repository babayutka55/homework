<?php echo "footer"; ?>
<?php
  //echo Model_Form::say_hello();
  echo Hoge\Model_Hoge::say_hello().'from hoge module';
 ?><br>
 <?php
 $entry = Hoge\Model_Hoge::find('all', array(
     'where' => array(
       array('id', 140)
     ),
 ));
 echo Debug::dump($entry);
  ?>
