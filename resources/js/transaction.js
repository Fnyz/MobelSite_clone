$(document).ready(function() {

    $.ajax({
        type: 'GET',
        url: '/transaction/getSupplierAndProduct',
        success: function(response) {

            // Supplier
            selectData("#supplier", response.supplier, "Select Supplier here");


              // Product
              selectData("#product", response.product, "Select Product here");
           
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    })
})


const selectData = (id, data, text) => {
    $(id).empty();
    $(id).append(`<option value="">${text}</option>`);
    // Iterate over categories and append options
    data.forEach(function(dt) {

        if(id === "#product"){
            $(id).append(`<option value="${dt[id.split("#")[1] + '_id']}"} data-quantity=${dt.product_quan} data-price=${dt.product_price}>
            ${dt[id.split("#")[1] + '_name']}
            </option>`);
        }else{
            $(id).append(`<option value="${dt[id.split("#")[1] + '_id']}"}>
            ${dt[id.split("#")[1] + '_name']}
            </option>`);
        }

    });

}



$('#product').change(function() {
    // Get the selected option value
    var productId = $(this).val();

    // Find the selected option element
    var selectedOption = $(this).find('option:selected');

    // Get the data attributes from the selected option
    var quantity = selectedOption.data('quantity');
    var price = selectedOption.data('price');

    // Perform any calculations or actions needed
    var totalPrice = quantity * parseFloat(price);

    // Log the retrieved values for testing
    console.log("Quantity:", quantity);
    console.log("Price:", price);
    console.log("Total Price:", totalPrice);
    console.log("id:", productId);
});
