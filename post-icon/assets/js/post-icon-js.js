jQuery(document).ready(function($) {
    $('.toggle-list').on('click', function () {
        $('.post-icon-dashicons-wrap').toggle();
    })

    $('.post-icon-dashicons-wrap').find('.dashicons').on('click', function(){
        $('#select-post-icon').val('<span class="post-icon dashicons dashicons-'+$(this).data('icon-name')+'"></span>')
    });
});