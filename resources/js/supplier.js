$(document).ready(function() {
   

    $.ajaxSetup({
        headers:
        { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });

    loadSearchResults("/supplier/getAllSupplier");
    
    $.ajax({
        type: 'GET',
        url: '/supplier/getAllSupplier',
        success: function(response) {
            displayProducts(response.supp.data);
   
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });

  //paginationSearchResult
    function loadSearchResults(url) {

        $.ajax({
            type: 'GET',
            url: url,
            success: function(response) {
             
                displayProducts(response.supp.data);
                $('#suppPaginationContainer').html(response.pagination);
             
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }


    $(document).on('click', '#suppPaginationContainer a', function(e) {
        e.preventDefault();
        var url = $(this).attr('href')
        loadSearchResults(url);
    });



    $('#supplierSearchForm').submit(function(e) {
        e.preventDefault();
        var query = $('#query').val();
        loadSearchResults(`${$(this).attr("action")}?query=${query}`);
    });







    const displayProducts = (suppliers) => {
   
        $('#table__supplier').empty();
        if (suppliers.length === 0) {
         $('#table__supplier').append('<tr><td colspan="6" class="text text-center ">No products found</td></tr>');
        } else {
         $.each(suppliers, function(index, supplier) {
             $('#table__supplier').append(
                 `<tr>
                   
                     <td>
                         <img src="storage/${supplier.supp_image}" alt="Product Image" width="70px">
                     </td>
                     <td>${supplier.supp_company}</td>
                     <td>${supplier.supp_address}</td>
                     <td>${supplier.supp_phone}</td>
                     <td>${moment(supplier.created_at).calendar()}</td>
                     <td>

                         <a href="/supplier/${supplier.id}/edit"  class="btn btn-primary" style="width:100%;">EDIT</a>
                         <form class="suppDeleteForm" action="/supplier/${supplier.id}" method="POST">
                             <input type="hidden" name="_method" value="DELETE"> <!-- Add method spoofing input -->
                             <button type="submit" class="btn btn-danger" style="width:100%;">DELETE</button>
                         </form>

                     </td>
                 </tr>`
             );
         });
     }
 }


 
 $(document).on('submit', '.suppDeleteForm', function(event) {
    event.preventDefault(); 

    var form = $(this); 

    if (confirm('Are you sure you want to delete this supplier?')) {
      
        $.ajax({
            type: 'POST',
            url: form.attr('action'),
            data: form.serialize(),
            success: function(response) {
                alert('Supplier deleted successfully.');
                window.location.href = '/supplier';
            },
            error: function(xhr, status, error) {
                console.error(error);
                alert('Error deleting product. Please try again.');
            }
        });
    }
});




    $('#supp_image').change(function() {
        var input = this;

        // Check if any file is selected
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            // When file is read
            reader.onload = function(e) {
                $('#supplier_image_show').attr('src', e.target.result).show();
            };

            // Read the selected file as Data URL
            reader.readAsDataURL(input.files[0]);
        }
    });


  

    // Create data
    $('#Supplier__create').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: '/supplier/create',
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                alert(data.success);
                window.location.href = '/supplier';
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
    $('#Supplier__update').submit(function(e) {
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
                window.location.href = '/supplier';
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


})