$(function(){


    var formDataArray = [];

    
    $.ajaxSetup({
        headers:
        { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });
 



    $('#form_submit').on('click', function(event) {
        event.preventDefault();
       const quan =  $("#quantity").val();
       const prod = $("#product_id").val();
       const user = $("#used_id").val();

        if(parseInt(quan) === 0 || !prod === "" || !user === ""){
            alert("Please provide all fields.");
            return;
        }
    
   
        var formData = $('#request_item').serialize();
        var productName = $('#product_id option:selected').text();
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
            $("#submitRequest .btn").show();
            $("#quantity").val(0);


        }
    });
    
    
    
    function displayFormData(formDataArray) {

        var container = $('#item__request');
        container.empty(); 

      
        formDataArray.forEach(function(formData) {
            var formDataHTML = generateFormDataHTML(formData);
            container.append(formDataHTML);
        });

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
        var quantity = formDataObject['quantity'];

    
        var html =  `<tr>
        <td>${prod_name}</td>
        <td>${quantity}</td>
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
            $("#submitRequest .btn").hide();
        }

        displayFormData(formDataArray);


    }


    $("#submitRequest").submit(function(e){
        e.preventDefault();

        $.ajax({
            url:$(this).attr("action") ,
            type:'post',
            data:{
                formDataArray
            },
            success:function(data){
               alert(data.message);
               window.location.href = '/dashboard';
            },
            error: function(xhr, status, error) {
               console.log(error)
            }
        });
    })
    
    
   

    
    
    
})