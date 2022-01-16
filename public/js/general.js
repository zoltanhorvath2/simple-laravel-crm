$(document).ready( function () {

    //Prevent duplicated form submits with disabling buttons
    //Prevent multiple form submission in general
    $('.btn-submit').click(function () {
        $('.btn-submit').attr('disabled', true);
        $('.form-to-submit').submit();
        return true;
    });

    //Prevent delete buttons to be clicked multiple times
    $(document).on('click', '.delete-button', function () {
        $(this).attr('disabled', true);
        $(this).css('pointer-events', 'none');
    })



})
