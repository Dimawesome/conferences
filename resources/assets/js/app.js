require('./bootstrap');

$(function () {
    $(document).on('click', '#logout', function () {
        $('#logout-form').trigger('submit');
    });
});
