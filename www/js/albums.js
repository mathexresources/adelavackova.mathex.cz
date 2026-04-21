$(function () {
    $('#no-albums').hide();

    $('.filter-btn').on('click', function () {
        $('.filter-btn').removeClass('active');
        $(this).addClass('active');

        var type = $(this).data('type');
        if (type === 'all') {
            $('.album').show();
            $('#no-albums').hide();
        } else {
            $('.album').hide();
            var visible = $('.album-id-' + type).show();
            $('#no-albums').toggle(visible.length === 0);
        }
    });
});
