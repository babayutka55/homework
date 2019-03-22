$(function(){

  $('#delete_btn').click(function(){

    var ids = []; //チェックしたid全て
    var ids_node = document.querySelectorAll('input[name="delete_flg"]:checked');

    for(let i = 0; i < ids_node.length; i++){
      ids.push(ids_node[i].value);
    }

    //ajax
    $.ajax({
      datatype : 'json',
      method : 'POST',
      data : {ids : ids},
      url : '../form/delete',
      //_token : cserf_token,保留
    }).done(function(data){
      console.log('success');
      console.log(data);

      //既存のテーブルのdom全削除
      $('.tr').empty();

      //dbから取ってきたものをテーブルに一から展開
      //console.log(data.lists);
      data.lists.forEach(function(el){
        $('#table').append('<tr id="' + el.id + '" class="tr"><td>' + el.first_name + '</td><td>' + el.last_name + '</td><td>' + el.gender + '</td><td><input name="delete_flg" value="' + el.id + '" type="checkbox" id="form_delete_flg"></td></tr>');
      });

    }).fail(function(data){
      alert(data);
    }).always(function(){
      console.log('finish');
    });


  });

  //「詳細をクリック」
  $('.btn-modal').on('click', function(){
    $('#overlay').fadeIn();
    $('#modal').fadeIn();

    //クリックした行の値をモーダルにセット
    let clicked_values = $(this).nextAll();
    $('#modal_first_name').val(clicked_values[0].innerHTML);
    $('#modal_last_name').val(clicked_values[1].innerHTML);
    $('#modal_gender').val(clicked_values[2].innerHTML);
  });

  $('#close-btn').on('click', function(){
    $('#overlay').fadeOut();
    $('#modal').fadeOut();
  });
  $('#overlay').on('click', function(){
    $('#overlay').fadeOut();
    $('#modal').fadeOut();
  });

  $('#modal_change_button').click(function(){

    console.log('a');

  })

})
