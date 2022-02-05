$(function () {
    $(document).on('input', '#date', function (e) {
        $('#output_date').text($('#date').val());
    });
});
$(function () {
    $(document).on('input', '#time', function (e) {
        $('#output_time').text($('#time').val());
    });
});

$(function () {
    $(document).on('input', '#total_number', function (e) {
        $('#output_number').text($('#total_number').val());
    });
});
