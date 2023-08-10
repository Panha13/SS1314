function toggleSlideshow(element) {
    console.log('element:', element);
    var id = $(element).data('id');
    var action = $(element).data('action');
    var page = $(element).data('page');
    $.ajax({
        url: '/admins/slideshow/endisable/' + id + '/' + action,
        type: 'GET',
        success: function(response) {
            var newIcon = response.slideshow.enable == 1 ? 'eye' : 'eye-off';
            console.log('i element:', $(element).find('svg'));
    $(element).find('svg').attr('data-feather', newIcon);
            
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
            console.log('updating feather icons');

            feather.replace();
        }
    });
}
