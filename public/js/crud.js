$(document).ready(function(){
    showArticle(action,page);
    $("#back").on("click", function() {
        location.href = 'http://test.job/';
    });
    $("#article").submit( function(){
        var error='';
        var title = $("#article [placeholder='title']").val();
        var text = $("#article [placeholder='text']").val();
        if(!title){error='Write a title'+' '}else{if(title.length<2){error+='Your title to short'+' '}}
        if(!text){error+='Write a text'+' '}
        if(!error) {
            $.ajax({
                type: "POST",
                url: '/ajax/ajax_crud_addoredit',
                data: {article: page, action: action, title: title, text: text},
                async: true,
                success: function (resp) {
                    if (resp) {
                        ShowPopup(resp);
                        setTimeout('location.href = "http://test.job/";', 3000);
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
});
function showArticle() {
    if(action=='edit') {
        $.ajax({
            type: "POST",
            url: '/ajax/ajax_article',
            dataType: "json",
            data: {article: page},
            async: false,
            success: function (resp) {
                $("#article [placeholder='title']").val(resp['title']);
                $("#article [placeholder='text']").val(resp['text']);
            }
        });
    }
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
