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

})
