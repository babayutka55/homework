$(function(){

  $('#delete_btn').click(function(){

    let val = document.querySelectorAll('input[name="delete_flg"]:checked');
    console.log("最初のdom" + val[0].name);

    //既存のテーブルのdom全削除

    //dbから取ってきたものをテーブルに一から展開

  });

})
