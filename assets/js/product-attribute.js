$(document).ready(function () {
    $('#productType').on('change', function () {
        $('.dynamic-field').hide();
        var selectedType = $(this).val();
        $('#size, #weight, #height, #width, #length').prop('required', false);

        if (selectedType){
            $('#' + selectedType + '-fields').show();
            $('.'+ selectedType).prop('required', true);
            $('#description').text('');
            $('#description').text('Please provide the '+$(this).find('option:selected').attr('class')+' for this product type '+selectedType);
        }

    });
    $('#productType').trigger('change');
});