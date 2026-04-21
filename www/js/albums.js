$('.filter-select').on('change', function () {
    var selectedValue = $(this).val();
    if (selectedValue === 'all') {
        $('.album').show();
        $('#no-albums').hide();
    } else {
        $('.album').hide();
        var visibleAlbums = $('.album-id-' + selectedValue).show();

        // If no albums are visible after the filter
        if (visibleAlbums.length === 0) {
            $('#no-albums').show();
        } else {
            $('#no-albums').hide();
        }
    }
});

$(function() {
    $('#no-albums').hide();
});
