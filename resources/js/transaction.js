$(document).ready(function() {


    $.ajax({
        type: 'GET',
        url: '/transaction/getSupplierAndProduct',
        success: function(response) {

            var transcode = new Set();

            var distintTranscode = response.transcode.filter(obj => {
                if (!transcode.has(obj.request_code)) {
                    transcode.add(obj.request_code);
                    return true;
                }
                return false;
            });


            // Transcode
            selectData("#transCode", distintTranscode, "Filter by Request code");
            // Supplier
            selectData("#supplier_id", response.supplier, "Select Supplier here");
       

         
          
           
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

        switch(id) {
            case "#product_id":
                $(id).append(`<option value="${dt.id}"} data-quantity=${dt.quantity} data-price=${!dt.price && 0}>
                ${dt.prod_name}
                </option>`);
            break;
            case "#supplier_id":
                $(id).append(`<option value="${dt.id}"}>
                ${dt.supp_company}
                </option>`);
            break;
            case "#transCode":
                $(id).append(`<option value="${dt.request_code}"}>
                ${dt.request_code}
                </option>`);
            break;
            default:
            
            }


    });

}

$('#transCode').change(function() {
    // Get the selected option value
    var transcode = $(this).val();

    $.ajax({
        type: 'GET',
        url: '/transaction/search?query=' + transcode,
        success: function(response) {
                 $("#product_id").attr('disabled',false); 
                 selectData("#product_id", response.product, "Select Product here");
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    })    
});




$('#product_id').change(function() {

    var selectedOption = $(this).find('option:selected');
    var quantity = selectedOption.data('quantity');
    var price = selectedOption.data('price');
    var subtotal = quantity * parseFloat(price);

    $("#trans_quantity").val(quantity);
    $("trans_price").val(price);
    $("#subtotal").val(parseFloat(subtotal).toFixed(2));
   
});


function calculate(value) {
    var $quantity = $('#trans_quantity').val();
    var subtotal;

    if (value != 0) {
        subtotal = parseInt($quantity) * parseFloat(value);
    }
    $('#subtotal').val(subtotal);    
}

$('#trans_price').on('keyup', function() {
    calculate(this.value);
});

let formDataArray = [];

$('#submit').on('click', function(event) {
    event.preventDefault();
    
    var formData = $("#Order__transactions").serialize();
    var productName = $('#product_id option:selected').text().trim();
    formData += '&product_name=' + encodeURIComponent(productName);


    var existingIndex = formDataArray.findIndex(function(item) {
        return item.indexOf('product_id=') !== -1 && item.split('product_id=')[1].split('&')[0] === formData.split('product_id=')[1].split('&')[0];
    });

 
    if (existingIndex !== -1) {
        formDataArray[existingIndex] = formData;
        alert("Product is already exist in the list!")
    } else {
      
        formDataArray.push(formData);
        displayFormData(formDataArray);
    
        $("#submitTrans .btn").show();
        $("#submitTrans").show();
        $("#trans_price").val(0.00);
        $("#trans_quantity").val(0);
        $("#subtotal").val(0.00);
        $("#product_id").val("");
        

    }
});


function displayFormData(formDataArray) {

    var container = $('#item__order-transactions');
    container.empty(); 

    var totalPrice = 0;

    formDataArray.forEach(function(formData) {
        var formDataHTML = generateFormDataHTML(formData);
        container.append(formDataHTML);

        var price = parseFloat(formData.split('&').find(item => item.startsWith('subtotal=')).split('=')[1]);
        totalPrice += price;
    });

    var totalPriceElement = document.createElement('td');
    totalPriceElement.innerHTML = `
        <p id="total_price-item" style="display: ${formDataArray.length ? 'inline' : 'none'}; ">TOTAL PRICE: 
            <span id="totalPriceValue" style="color: red; font-weight: bold;">
                $${totalPrice.toFixed(2)}
            </span>
        </p>
    `;

    container.append(totalPriceElement);
}



function generateFormDataHTML(formData) {
 
    var formDataArray = formData.split('&');
    var formDataObject = {};
    formDataArray.forEach(function(item) {
        var pair = item.split('=');
        formDataObject[pair[0]] = decodeURIComponent(pair[1] || '');
    });

    var prod_id = formDataObject['product_id'];
    var prod_name = formDataObject['product_name'];
    var quantity = formDataObject['trans_quantity'];
    var price = formDataObject['trans_price'];
    var subtotal = formDataObject['subtotal'];


    var html =  `<tr>
    <td>${prod_name}</td>
    <td>${price}</td>
    <td>${quantity}</td>
    <td>${subtotal}</td>
    <td>
        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
            <button type="button" class="btn btn-danger deleteBtn" data-prod-id="${prod_id}"><i class="fa-sharp fa-solid fa-xmark"></i></button>
        </div>
    </td>
</tr>`;

    return html;
}

document.body.addEventListener('click', function(event) {
    if (event.target.classList.contains('deleteBtn')) {
        var prod_id = event.target.getAttribute('data-prod-id');
        deleteData(prod_id);
    }
});

function deleteData(id) {
    formDataArray = formDataArray.filter(function(item) {
        return item.indexOf('product_id=' + id) === -1;
    });

    if(!formDataArray.length){
        $("#submitTrans .btn").hide();
        $("#submitTrans").hide();
        $("#trans_payment").val("");
    }

    displayFormData(formDataArray);
}


$("#submitTrans").submit(function(e){
    e.preventDefault();

    const trans_payment = $("#trans_payment").val();
    const totalPriceValue = $("#totalPriceValue");

    if(parseFloat(trans_payment) < parseFloat(totalPriceValue.text().trim().split("$")[1])){
        alert("Payment is too short please try again?");
        $("#trans_payment").val("");
        return;
    }

    $.ajax({
        url: $(this).attr("action"),
        type: 'post',
        data: {
            formDataArray,
            trans_payment,
        }, 
        success: function(data) {
            alert(data.message);
            window.location.href = '/transaction';
        },
        error: function(xhr, status, error) {
            console.log(error);
        }
    });
})



