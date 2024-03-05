import './bootstrap';
import './supplier';
import './transaction';
import './positions';
import './request';


$(document).ready(function() {

    

    $.ajaxSetup({
        headers:
        { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });

  

    loadSearchResults('/dashboard/showproduct');

   
    $.ajax({
        type: 'GET',
        url: '/dashboard/showproduct',
        success: function(response) {
            
            if(response.positions === "Staff"){
                displayProducts(response.requestProduct, response.positions);
                return;
            }

            displayProducts(response.products.data, response.positions);
            
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });

   
    const displayProducts = (products, positions) => {
           $('#table__result').empty();
           if (products.length === 0) {
            $('#table__result').append('<tr><td colspan="8" class="text text-center ">No products found</td></tr>');
           } else {
            $.each(products, function(index, product) {
                $('#table__result').append(
                    positions === "Employee" ? 
                    `
                    <tr>
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
                    </tr>
                    `:
                    `<tr>
                        <td>
                            <img src="storage/${product.image}" alt="Product Image" width="70px">
                        </td>
                        <td>${product.prod_name}</td>
                        <td>${product.quantity}</td>
                        <td>${moment(product.created_at).calendar()}</td>
                        <td style="color: ${product.Remarks === "PENDING" ? "red" : "blue"}; font-weight:bold;" >${product.Remarks}</td>
                    </tr>
                    `
                );
            });
        }
    }


    // When a file is selected
    $('#image').change(function() {
        var input = this;

        // Check if any file is selected
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            // When file is read
            reader.onload = function(e) {
                $('#imagePreview').attr('src', e.target.result).show();
            };

            // Read the selected file as Data URL
            reader.readAsDataURL(input.files[0]);
        }
    });

    // Create data
    $('#Product__create').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: '/create',
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                alert(data.success);
                window.location.href = '/dashboard';
            },
            error: function(xhr, status, error) {
                const errors = xhr.responseJSON.errors;
                $.each(errors, function(key, value) {
                    $("#" + key + "-error").text(value);

                    setTimeout(function() {
                        $("#" + key + "-error").text('');
                    }, 3000)
                });
            }
        });
    });

    
    // Update data
    $('#Product__update').submit(function(e) {
        e.preventDefault();

        var formData = new FormData(this);
 
        
        $.ajax({
            type: 'Post',
            url: $(this).attr('action'),
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                alert(data.success);
                window.location.href = '/dashboard';
            },
            error: function(xhr, status, error) {
                const errors = xhr.responseJSON.errors;
                $.each(errors, function(key, value) {
                    $("#" + key + "-error").text(value);
        
                    setTimeout(function() {
                        $("#" + key + "-error").text('');
                    }, 3000)
                });
            }
        });
        
    });

    function loadSearchResults(url) {

        $.ajax({
            type: 'GET',
            url: url,
            success: function(response) {
                if(response.positions === "Staff"){
                    displayProducts(response.requestProduct.data, response.positions);
                    return;
                }
    
                displayProducts(response.products.data, response.positions);
                $('#paginationContainer').html(response.pagination);
             
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    // Submit search form
    $('#searchForm').submit(function(e) {
        e.preventDefault();
        var query = $('#query').val();
        loadSearchResults($(this).attr("action") + '?query=' + query);
    });



    // Event listener for pagination links
    $(document).on('click', '#paginationContainer a', function(e) {
        e.preventDefault();
        var url = $(this).attr('href')
        loadSearchResults(url);
    });


    $(document).on('submit', '.deleteProductForm', function(event) {
        event.preventDefault(); 
    
        var form = $(this); 
        console.log(form.serialize());

        if (confirm('Are you sure you want to delete this product?')) {
          
            $.ajax({
                type: 'POST',
                url: form.attr('action'),
                data: form.serialize(),
                success: function(response) {
                    alert('Product deleted successfully.');
                    window.location.href = '/dashboard';
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    alert('Error deleting product. Please try again.');
                }
            });
        }
    });
    



});
