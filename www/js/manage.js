var pendingDeleteId = null;

$('.destroyAlbum').click(function() {
    pendingDeleteId = $(this).data('album-id');
    $('#deleteAlbumName').text($(this).data('album-name'));
    new bootstrap.Modal(document.getElementById('deleteAlbumModal')).show();
});

$('#deleteAlbumConfirm').click(function() {
    if (!pendingDeleteId) return;
    $('#deleteAlbumModal').modal('hide');
    $.ajax({
        url: '/api/album.php',
        type: 'POST',
        data: {action: 'destroy', albumId: pendingDeleteId},
        success: function(result) {
            if (result.success) {
                window.location.reload();
            } else {
                alert(result.message);
            }
        }
    });
});

$('.deleteAlbum').click(function() {
    var albumId = $(this).data('album-id');
    $.ajax({
        url: '/api/album.php',
        type: 'POST',
        data: {
            action: 'delete',
            albumId: albumId,
            data: ''
        },
        success: function(result) {
            console.log(result);
            window.location.reload();

        }
    });
});

window.addEventListener('pageshow', function(e) {
    if (e.persisted) window.location.reload();
});

$('.createAlbum').click(function() {
    var albumId = $(this).data('album-id');
    $.ajax({
        url: '/api/album.php',
        type: 'POST',
        data: {
            action: 'create',
            albumId: 0,
            data: ''
        },
        success: function(result) {
            console.log(result);
            window.location.replace('/edit?id=' + result.id);

        }
    });
});
