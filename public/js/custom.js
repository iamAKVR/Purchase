/*-----product sales adding custom js file ----*/
$(document).ready(function() {
    inputDisabled(true);
    $("#submit").prop('disabled', true);
    
    $('#name').keyup(function(){ 
        inputDisabled(true);
        $('#name').removeClass('is-valid');
        $("#submit").prop('disabled', true);
        $("#success").hide();
        $("#error").hide();

        if($(this).val().length > 2)
        {
         $.ajax({
          url:"/api/products-search",
          method:"get",
          data:{'key':$(this).val()},
          success:function(response){
            $('#nameList').html('');
            var html = '';
            $.each(response.data, function( index, value ) {
               html = html + '<li  data-unit="'+value.unit+'" data-id="'+value.id+'" class="list-group-item product-li">'+value.name+'</li>';
            });
            $('#nameList').append(html);
          }
         });
        }
    });

    $(document).on('click', '.product-li', function(){  
        $('#name').val($(this).text());  
        $('#unit').val($(this).data('unit'));    
        $('#product_id').val($(this).data('id'));  
        $('#name').addClass('is-valid');
        $('#nameList').html('');
        inputDisabled(false);
    });  
    
    $('#net_price').keyup(function(){ 
        removeClass();   
        $("#submit").prop('disabled', true);
        var totalUnit = parseFloat($("#total_unit").val()); 
        var netPrice = parseFloat($("#net_price").val());
        var perUnitPrice = netPrice/totalUnit;
        $("#unit_price").val(perUnitPrice);

        $.ajax({
            url:'/api/get-mark-up',
            method:"get",
            async: false,
            data:{'per_unit_price':perUnitPrice, 'product_id':$("#product_id").val() },
            success:function(response){
                if(response.data != null){
                    var markup =  parseFloat(response.data.markup);
                    var salesPrice = perUnitPrice + (perUnitPrice * (markup/100));
                    $('#markup').val(markup); 
                    $("#sales_price").val(salesPrice);
                    addClass();
                    $("#submit").prop('disabled', false);
                    $("#error").hide();
                }else{
                    $('#markup').addClass('is-invalid');
                    $('#sales_price').addClass('is-invalid');
                    $("#error").show();
                }
            },
            error:function(error){
                console.log(error.responseJSON.message);
            }
        });
    });

    function removeClass(){
        $('#markup').val(''); 
        $("#sales_price").val('');

        $('#net_price').removeClass('is-valid');
        $('#sales_price').removeClass('is-valid');
        $('#markup').removeClass('is-valid');
        $('#unit').removeClass('is-valid');
        $('#unit_price').removeClass('is-valid');
        $('#total_unit').removeClass('is-valid');

        $('#sales_price').removeClass('is-invalid');
        $('#markup').removeClass('is-invalid');
    }

    function addClass(){
        $('#net_price').addClass('is-valid');
        $('#markup').addClass('is-valid');
        $('#sales_price').addClass('is-valid');
        $('#unit_price').addClass('is-valid');
        $('#total_unit').addClass('is-valid');
        $('#unit').addClass('is-valid');
    }

    function inputDisabled(e){
        $("#net_price").prop('disabled', e);
        $("#total_unit").prop('disabled', e);
    }

    $('#purchaseForm').submit(function(event){  
        event.preventDefault();
        var isValid = false; 
        $("#purchaseForm input").each(function() {
            if (!$(this).hasClass("is-valid")) isvalid = false;
            else isValid = true
        });
        if(isValid){
            var formArray = $( this ).serializeArray();
            var len = formArray.length;
            var dataObj = {};
            for (i=0; i<len; i++) {
                dataObj[formArray[i].name] = formArray[i].value;
            } 
            $.ajax({
                url:'/api/set-product-sale',
                method:"post",
                async: false,
                data:dataObj,
                success:function(response){
                    if(response.data){
                        $("#success").html(response.message);
                        $("#success").show();
                        resetForm();
                    }
                },            
                error:function(error){
                    $("#error").html(error.responseJSON.message);
                    $("#error").show();
                }
            });
        }else{
            $("#error").show();
        }

    });

    function resetForm(){
        $("#purchaseForm").trigger("reset");
        removeClass();
        inputDisabled(true);
        $('#name').removeClass('is-valid');
        $("#submit").prop('disabled', true);
    }
});
    