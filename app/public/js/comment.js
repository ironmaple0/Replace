
$(function() {
    get_data();
});

function get_data() {
const chatId = $('.card-header').text();
console.log(chatId)
    $.ajax({
    url: "/result/ajax/",
    data:{'chat_id':chatId },
    dataType:"json",
    success: data => {
        $("#comment-data")
        .find(".comment-visible")
        .remove();
        for (let i = 0; i < data.comments.length; i++) {        
            let html = `
           <div class = "media comment-visible">
            <div class = "media-body comment-body">
             <div class = "row">
              <span class= "comment-body-time" id= "created_at">${data.comments[i].created_at}</span>
             </div>
             <span class= "comment-body-content" id= "comment">${data.comments[i].content}</span>
            </div>
           </div>
           `;
           $("#comment-data").append(html);
        }
    },
  }).fail(function (jqXHR, textStatus, errorThrown) {
    // 通信失敗時の処理
      console.log("ajax通信に失敗しました");
      console.log("errorThrown    : " + errorThrown.message); // 例外情報
});

    //setTimeout("get_data()", 5000);
}