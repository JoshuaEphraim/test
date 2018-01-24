$(document).ready(function(){
    showArticles();
    $(document).on('click', '.edit', function(){
        var id=$( this ).attr('name');
        top.location.href = 'http://test.job/edit/'+id;
    });
    $(document).on('click', '.delete', function(){
        if(confirm("Are you sure you want to delete this article?")) {
            var id = $(this).attr('name');
            $.ajax({
                type: "POST",
                url: '/ajax/ajax_crud_delete',
                data: {article: id},
                async: true,
                success: function (resp) {
                    showArticles();
                }
            });
        }
    });
});
function showArticles() {
    $('.articles').html('');
    $.ajax({
        type: "POST",
        url: '/ajax/ajax_main_articles',
        dataType: "json",
        async: false,
        success: function (resp) {
            $.each(resp, function (index, value) {

                    $('.articles').append('<div class="article" id="'+value['id']+'">');
                    $('.articles #'+value['id']).append('<h2 class="title">' + value['title']);
                    $('.articles #' + value['id']).append('<p class="time" >last action:' + value['updatetime']);
                    $('.articles #'+value['id']).append('<p id="desc' + value['id'] + '" class="Description">'+ value['text']+'...');
                    $('.articles #' + value['id']+' p[id="desc' + value['id'] + '"]').append('<a href="http://test.job/article/'+value['id']+'" target="_top">Read more');
                    $('.articles #'+value['id']).append('<button class="edit" name="'+value['id']+'" id="edit'+value['id']+'">Edit');
                    $('.articles #'+value['id']).append('<button class="delete" name="'+value['id']+'" id="delete'+value['id']+'">Delete');
                    if(value['comments']>0) {
                        $('.articles #' + value['id']).append('<p class="comments" >comments(' + value['comments'] + ')');
                    }
            });

        }

    });
}
