function toggleSlideshow(element) {
    // console.log('element:', element);
    var id = $(element).data('id');
    var action = $(element).data('action');
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

$(document).ready(function() {
    // Add click event listeners to the move up and move down icons
    $('.moveUpDown').on('click', function(e) {
        e.preventDefault();
        var row = $(this).closest('tr');
        var isLastRowOnPage = row.is(':last-child');
        var isFirstRowOnPage = row.is(':first-child');
        if ($(this).children('svg').hasClass('feather-arrow-up')) {
            row.insertBefore(row.prev());
            // console.log('up');
        } else if ($(this).children('svg').hasClass('feather-arrow-down')) {
            row.insertAfter(row.next());
            // console.log('down');
        }
        // Send an AJAX request to the server-side route for handling move up and move down actions
        var url = $(this).attr('href');
        $.ajax({
            type: 'GET',
            url: url,
            success: function(data) {
                // console.log(isFirstRowOnPage);
                // console.log(isLastRowOnPage);
                // console.log(e.target);
                // console.log($(e.target).find('svg').hasClass('feather-arrow-down'));
                // Navigate to the second page if the last slideshow on the first page was moved down
                if (isLastRowOnPage && $(e.target).hasClass('feather-arrow-down')) {
                    if ($('.page-item.active').next().find('.page-link').length && !$('.page-item.active').next().hasClass('disabled')) {
                        window.location.href = $('.page-item.active').next().find('.page-link').attr('href');
                    }
                } 
                if (isFirstRowOnPage && $(e.target).hasClass('feather-arrow-up')) {
                    if ($('.page-item.active').prev().find('.page-link').length && !$('.page-item.active').prev().hasClass('disabled')) {
                        window.location.href = $('.page-item.active').prev().find('.page-link').attr('href');
                    }
                }
            }
        });
    });
});

