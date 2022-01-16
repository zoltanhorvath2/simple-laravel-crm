//HANDLE CSRF TOKENS IN AJAX REQUESTS
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
});
