$(document).ready(function() {
    $('#product-type').on('change', function() {
        $('.dynamic-field').hide();
        var selectedType = $(this).val();
        $('#size, #weight, #height, #width, #length').prop('required', false);

        if (selectedType)
            $('#' + selectedType + '-fields').show();

        if (selectedType == 'dvd') 
            $('#size').prop('required', true);
         else if (selectedType == 'book') 
            $('#weight').prop('required', true);
         else if (selectedType == 'furniture') 
            $('#height, #width, #length').prop('required', true);
        
    });
    $('#product-type').trigger('change');
});
