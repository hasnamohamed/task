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
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('product-form');

    form.addEventListener('submit', function(event) {
        let isValid = true;
        
        document.querySelectorAll('.text-danger').forEach(el => el.style.display = 'none');
        
        const skuInput = document.getElementById('sku');
        if (!skuInput.value) {
            document.getElementById('sku-error').style.display = 'block';
            isValid = false;
        }

        const nameInput = document.getElementById('name');
        if (!nameInput.value) {
            document.getElementById('name-error').style.display = 'block';
            isValid = false;
        }

        const priceInput = document.getElementById('price');
        if (!priceInput.value) {
            document.getElementById('price-error').style.display = 'block';
            isValid = false;
        }

        const productTypeSelect = document.getElementById('productType');
        if (!productTypeSelect.value) {
            document.getElementById('productType-error').style.display = 'block';
            isValid = false;
        }

        if (!isValid) {
            event.preventDefault(); 
        }
    });
});
