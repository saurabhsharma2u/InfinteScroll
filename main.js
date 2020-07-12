$(document).ready(function () {
    var page_num = 1;
    load_page(page_num, false);

    $(window).scroll(function () {
        if ($(window).scrollTop() + $(window).height() > $(document).height() - 100) {
            page_num++;
            load_page(page_num, false);
        }
    })
});

function load_page(page_num, loading) {
    if (loading == false) {
        loading = true;
        jQuery.ajax({
            type: 'POST',
            url: BASE_URL + 'Welcome/posts',
            data:{
                page_num:page_num
            },            
            success: function (response) {
                $('#ajax-loader').hide()
                loading =false;
                $("#dynamic-posts").append(response);

            },
            error: function (e) { }
        });
    }
}