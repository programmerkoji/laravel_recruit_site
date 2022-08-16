$(function () {
    $('.bl_searchArea_item').on('click', function() {
        var modalId = $(this).data('id');
        $('.bl_modal[data-id="modal_' + modalId + '"], .bl_overlay').fadeIn();
    });
    $('.bl_modal_close, .bl_overlay').on('click', function() {
        $('.bl_modal, .bl_overlay').fadeOut();
    });
});
