$(document).ready(function(){
    showArticle();
    showComments();
    $("#add_comment").on("submit", function(){
        var error='';
        var comment = $("#add_comment [placeholder='Your Comment']").val();
        var e_mail = $("#add_comment [placeholder='Your E-Mail']").val();
        var name = $("#add_comment [placeholder='Your Name']").val();
        if(!name){error='Write your name'+' '}else{if(name.length<2){error+='Your name to short'+' '}}
        if(!comment){error+='Write a comment'+' '}
        var r = /^[\w\.\d-_]+@[\w\.\d-_]+\.\w{2,4}$/i;
        if(!e_mail){error+='Write your email'+' '}else{if(!r.test(e_mail)){error+='Your email not correct'+' '}}
        if(!error) {
            $.ajax({
                type: "POST",
                url: '/ajax/ajax_comment',
                data: {comment: comment, name: name, article: page, e_mail: e_mail},
                success: function (resp) {
                    if (resp) {
                        ShowPopup(resp);
                        $("#add_comment [placeholder='Your Comment'], #add_comment [placeholder='Your E-Mail'], #add_comment [placeholder='Your Name']").val('');
                        showComments();
                    }
                }
            });
        }
        else
        {
            ShowPopup(error);
        }
        return false;
    });
    $("#back").on("click", function() {
        location.href = 'http://test.job/';
    });
});

function showArticle() {
    $.ajax({
        type: "POST",
        url: '/ajax/ajax_article',
        dataType: "json",
        data:{article:page},
        async: false,
        success: function (resp) {
            $('.article').append('<h1 class="title">' + resp['title']);
            $('.article').append('<p class="text">'+ resp['text']);
            $('.article').append('<button id="back">Back');
        }
    });
}
function showComments() {
    $('.comments').html('');
    $.ajax({
        type: "POST",
        url: '/ajax/ajax_article_comments',
        dataType: "json",
        data:{article:page},
        async: false,
        success: function (resp) {
            $.each(resp, function (index, value) {
                $('.comments').append('<div class="comment" id="' + value['id'] + '">');
                $('.comments #' + value['id']).append('<h2 class="name">' + value['name']);
                $('.comments #' + value['id']).append('<p id="comment' + value['id'] + '" class="comment">' + value['text']);
            });
        }

    });
}
function ShowPopup(x)
{
    document.getElementById("popup").innerHTML=x;
    document.getElementById("popup").style.display="block";
    setTimeout('HidePopup()', 3000);
}
function HidePopup()
{
    document.getElementById("popup").style.display="none";
}
