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
    const errorMessageElements = {
        sku: document.getElementById('sku-error'),
        name: document.getElementById('name-error'),
        price: document.getElementById('price-error'),
        attribute: document.getElementById('productType-error')
    };

    form.addEventListener('submit', function(event) {
        let isValid = true;

        Object.values(errorMessageElements).forEach(el => el.style.display = 'none');

        const skuInput = document.getElementById('sku');
        if (!skuInput.value.trim()) {
            errorMessageElements.sku.textContent = 'SKU is required.';
            errorMessageElements.sku.style.display = 'block';
            isValid = false;
        }

        const nameInput = document.getElementById('name');
        if (!nameInput.value.trim()) {
            errorMessageElements.name.textContent = 'Product Name is required.';
            errorMessageElements.name.style.display = 'block';
            isValid = false;
        }

        const priceInput = document.getElementById('price');
        if (!priceInput.value || parseFloat(priceInput.value) <= 0) {
            errorMessageElements.price.textContent = 'Price must be a positive number.';
            errorMessageElements.price.style.display = 'block';
            isValid = false;
        }

        const productTypeSelect = document.getElementById('productType');
        if (!productTypeSelect.value) {
            errorMessageElements.attribute.textContent = 'Product Type is required.';
            errorMessageElements.attribute.style.display = 'block';
            isValid = false;
        }

        if (!isValid) {
            event.preventDefault();
        }
    });
});

