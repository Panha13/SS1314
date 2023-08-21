
function handlePopstate() {
    window.addEventListener('popstate', function(event) {
        showSlideshow();
    });
}

function pagination() {
    $(document).on('click', '.pagination a', function(event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        showSlideshow(page);
        history.pushState(null, null, '?page=' + page);
    });
}

function showSlideshow(page) {
    if (!page) {
        var urlParams = new URLSearchParams(window.location.search);
        page = urlParams.get('page') || 1;
    }
    $.ajax({
        url: '/admins/slideshow/getSlideshow?page=' + page,
        type: 'GET',
        success: function(data) {
            $('#slideshowBody').html(data.data);
            $('#pagenation').html(data.pagination);
            feather.replace();
        }
    });
}

function toggleSlideshow(element) {
    // console.log('element:', element);
    var id = $(element).data('id');
    console.log(id);
    var action = $(element).data('action');
    console.log(action);
    $.ajax({
        url: '/admins/slideshow/endisable/' + id + '/' + action,
        type: 'GET',
        success: function(response) {
            var newIcon = response.slideshow.enable == 1 ? 'eye' : 'eye-off';
            // console.log('i element:', $(element).find('svg'));
            
            $(element).find('svg').attr('data-feather', newIcon);
            // update icon
            if (response.slideshow.enable == 1) {
                $(element).find('svg').attr('data-feather', 'eye');
            } else {
                $(element).find('svg').attr('data-feather', 'eye-off');
            }
            // update data-action attribute
            $(element).data('action', response.slideshow.enable);
            // reinitialize feather icons
            // console.log('updating feather icons');

            feather.replace();
        }
    });
}

function moveUpDown(event, element) {
    event.preventDefault();
    var row = $(element).closest('tr');
    var isLastRowOnPage = row.is(':last-child');
    var isFirstRowOnPage = row.is(':first-child');
    // Send an AJAX request to the server-side route for handling move up and move down actions
    var url = $(element).attr('href');
    $.ajax({
        type: 'GET',
        url: url,
        success: function(data) {
            // Debugging logs and navigation logic | console.log(isFirstRowOnPage) | console.log(isLastRowOnPage) | console.log(e.target) | console.log($(e.target).find('svg').hasClass('feather-arrow-down'))
            // Navigate to the second page if the last slideshow on the first page was moved down
            if (isLastRowOnPage && $(element).children('svg').hasClass('feather-arrow-down')) {
                if ($('.page-item.active').next().find('.page-link').length && !$('.page-item.active').next().hasClass('disabled')) {
                    $('.page-item.active').next().find('.page-link')[0].click();
                }
            } else if (isFirstRowOnPage && $(element).children('svg').hasClass('feather-arrow-up')) {
                if ($('.page-item.active').prev().find('.page-link').length && !$('.page-item.active').prev().hasClass('disabled')) {
                    $('.page-item.active').prev().find('.page-link')[0].click();
                }
            }else{
                showSlideshow();
            }
        }
    });
}

function deleteSlideshow(id) {
    $('#deleteModal').modal('show');
    $('#deleteSlideshow').val(id);

    $('#deleteSlideshow').off('click').on('click', function() {
        $.ajax({
            url: '/admins/slideshow/delete/' + id,
            type: 'POST',
            data: {id: id},
            success: function() {
                $('#deleteModal').modal('hide');
                if ($('.slideshow-row').length === 1 && $('.pagination .active').prev().length > 0) {
                    $('.pagination .active').prev().find('a').trigger('click');
                } else {
                    showSlideshow();
                }
            }
        });
    });
}

