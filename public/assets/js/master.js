$(function(){

  $('#delete_btn').click(function(){

    var delete_ids_node = document.querySelectorAll('input[name="delete_flg"]:checked');

    if(delete_ids_node.length == 0){
      console.log('削除チェック箇所なし');
      return;
    }

    var delete_ids = [];  //削除チェックしたid全てを格納する配列
    var id_all = [];      //画面内に存在するid全て

    //それぞれを格納
    document.querySelectorAll('.user_id').forEach(function(el){
      id_all.push(el.innerHTML);
    });

    for(let i = 0; i < delete_ids_node.length; i++){
      delete_ids.push(delete_ids_node[i].value);
    }


    //ajax
    $.ajax({
      datatype : 'json',
      method : 'POST',
      data : {
        delete_ids : delete_ids,
        id_all : id_all
      },
      url : '../form/delete',
      //_token : cserf_token,保留
    }).done(function(data){
      console.log('success');
      console.log(data);

      //既存のテーブルのdom全削除
      $('.tr').empty();

      //dbから取ってきたものをテーブルに一から展開


      //取得した行をテーブルに展開
      data.lists.forEach(function(el){
        $('#table').append('<tr id="' + el.id + '" class="tr"><td class="btn-modal"><button>詳細</button></td><td class="user_id">' + el.id + '</td><td>' + el.first_name + '</td><td>' + el.last_name + '</td><td>' + el.gender + '</td><td><input name="delete_flg" value="' + el.id + '" type="checkbox" id="form_delete_flg"></td></tr>');
      });

    }).fail(function(data){
      alert(data);
    }).always(function(){
      console.log('finish');
    });


  });

  //「詳細をクリック」
  $(document).on('click','.btn-modal',function(){console.log('btn-modal clicked');
    $('#overlay').fadeIn();
    $('#modal').fadeIn();

    //クリックした行の値をモーダルにセット
    let clicked_values = $(this).nextAll();
    $('#modal_id').html(clicked_values[0].innerHTML);
    $('#modal_first_name').val(clicked_values[1].innerHTML);
    $('#modal_last_name').val(clicked_values[2].innerHTML);
    $('#modal_gender').val(clicked_values[3].innerHTML);
  });

  $('#close-btn').on('click', function(){
    $('#overlay').fadeOut();
    $('#modal').fadeOut();
  });
  $('#overlay').on('click', function(){
    $('#overlay').fadeOut();
    $('#modal').fadeOut();
  });

  //モーダルからの変更
  $('#modal_change_button').click(function(){

    var vals = {
      id : $('#modal_id').html(),
      first_name : $('#modal_first_name').val(),
      last_name : $('#modal_last_name').val(),
      gender : $('#modal_gender').val()
    }

    $.ajax({
      method : 'POST',
      url : '../form/update2',
      datatype : 'json',
      data : vals
    }).done(function(data){

      //console.log(data.result.id);
      //return;

      let id = data.result.id;

      //テーブルを編集。dataは行の各値が入った配列
      //console.log(data.result[0].id);
      $('#' + id).children()[2].innerHTML = data.result.first_name;
      $('#' + id).children()[3].innerHTML = data.result.last_name;
      $('#' + id).children()[4].innerHTML = data.result.gender;



    }).fail(function(data){

    }).always(function(){

      console.log('finish');

    });

  })

})
