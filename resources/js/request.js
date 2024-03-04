$(function(){
    var formDataArray = [];

    $('#submit').on('click', function(event) {
        event.preventDefault();
    
        // Serialize the form data
        var formData = $('#request_item').serialize();
    
        // Get the selected product name
        var productName = $('#product_id option:selected').text();

        
        // Concatenate the product name with the serialized form data
        formData += '&product_name=' + encodeURIComponent(productName);


        // Check if the same name already exists in the array
        var existingIndex = formDataArray.findIndex(function(item) {
            return item.indexOf('product_id=') !== -1 && item.split('product_id=')[1].split('&')[0] === formData.split('product_id=')[1].split('&')[0];
        });
    
        // If the same name exists, replace the existing entry
        if (existingIndex !== -1) {
            formDataArray[existingIndex] = formData;
            alert("Item is already exist!");
        } else {
            // If the same name does not exist, push new data to the array
            formDataArray.push(formData);
            displayFormData(formDataArray);

        }
    });
    
    function deleteData(id) {
        // Find the index of the item with the specified ID
        var indexToDelete = formDataArray.findIndex(function(item) {
            return item.indexOf('prod_id=' + id) !== -1;
        });
    
        // If the item is found, remove it from the array
        if (indexToDelete !== -1) {
            formDataArray.splice(indexToDelete, 1);
            console.log("Item with ID " + id + " removed from the array.");
        } else {
            console.log("Item with ID " + id + " not found in the array.");
        }
    
        // Log the array to see the updated data
        displayFormData(formDataArray);
    }
    
    function displayFormData(formDataArray) {
        var container = $('#item__request');
        container.empty(); // Clear previous content
    
        // Initialize total price variable
        var totalPrice = 0;
    
        // Generate HTML markup for each item in the formDataArray and calculate total price
        formDataArray.forEach(function(formData) {
            var formDataHTML = generateFormDataHTML(formData);
            container.append(formDataHTML);
    
            // Extract price from formData and add it to the total price
            // var price = parseFloat(formData.split('&').find(item => item.startsWith('total_price=')).split('=')[1]);
            // totalPrice += price;
        });
    
         // Append total price to the container
        //  container.append('<p style="margin-top:10px; margin-left:10px;">Total Price: <span style="color: red; font-weight: bold;">$' + totalPrice.toFixed(2) + '</span></p>');
    
        // totalPrices = totalPrice.toFixed(2);
    }
    
    
    
    function generateFormDataHTML(formData) {
        // Deserialize the form data
        var formDataArray = formData.split('&');
        var formDataObject = {};
        formDataArray.forEach(function(item) {
            var pair = item.split('=');
            formDataObject[pair[0]] = decodeURIComponent(pair[1] || '');
        });
    
        // Extract data from the formDataObject
        var prod_id = formDataObject['prod_id'];
        var prod_name = formDataObject['productName'];
        var quantity = formDataObject['onhand'];
        var price = formDataObject['total_price'];
    
        var html =  `<tr>
                      
        <td>
            <img src="storage/${product.image}" alt="Product Image" width="70px">
        </td>
        <td>${product.product_name}</td>
        <td>${!product.price ? 0.00 : product.price}</td>
        <td>${!product.quantity ? 0 : product.quantity}</td>
        <td>${product.description}</td>
        <td style="color: ${product.Remarks === "UNAVAILABLE" ? "red" : "blue"};">${product.Remarks}</td>
        <td>${moment(product.created_at).calendar()}</td>
        <td>

            <a href="/${product.id}/edit"  class="btn btn-primary" style="width:100%;">EDIT</a>
            <form class="deleteProductForm" action="/dashboard/${product.id}" method="POST">
                <input type="hidden" name="_method" value="DELETE"> <!-- Add method spoofing input -->
                <button type="submit" class="btn btn-danger" style="width:100%;">DELETE</button>
            </form>

        </td>
    </tr>`;
    
        return html;
    }
    
    
    
})