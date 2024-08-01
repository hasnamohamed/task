$(document).ready(function() {
    $('#product-type').on('change', function() {
        $('.dynamic-field').hide();
        var selectedType = $(this).val();
        console.log(selectedType);
        if (selectedType) {
            $('#' + selectedType + '-fields').show();
        }
    });
});
