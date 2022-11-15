$(document).ready(function(){
    $('#memberForm input[data-validate="true"]').on('input change focusout', function(e){
        validate_field($(this).attr('name'), $(this).val())
    })

    $('#memberForm').submit(function(e){
        e.preventDefault()
        $('.main_success, .main_error').text('')
        $('#memberForm input[data-validate="true"]').trigger('change')
        if($('#memberForm').hasClass('was-validated') !== true)
        return false;
        $("#submit").attr('disabled', true)
        $.ajax({
            url:"insertData.php",
            method: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            error:err=>{
                console.error(err)
                $('.main_error').text("An error occured while saving the data");
                $("#submit").attr('disabled', false)
            },
            success: function(resp){
                if(resp.status == 'success'){
                    $('.main_success').text("New member data has been saved successfully.");
                    $('#memberForm').removeClass('was-validated')
                    $('#memberForm .is-valid').removeClass('is-valid')
                    $('#memberForm')[0].reset();
                }else if(resp.status == 'failed'){
                    if(!!resp.error)
                        $('.main_error').text(resp.error);
                    else
                        $('.main_error').text("An error occured while saving the data");
                }else{
                    $('.main_error').text("An error occured while saving the data");
                }
                $("#submit").attr('disabled', false)
            }
        })
    })
})
function validate_field($field="", $value=""){
    $field = $field.trim();
    $value = $value.trim();
    if($field == "" || $field == null){
        console.error("Input Field Validation Failed: Given Field Name is empty.");
        return false;
    }
    // console.log($(`[name="${$field}"]`).siblings('.input-field')[0])
    $(`[name="${$field}"]`).siblings('.input-loader').removeClass('d-none')
    $(`[name="${$field}"]`).removeClass('is-valid is-invalid')
    $("#submit").attr('disabled', true)

    $.ajax({
        url:'validate.php',
        method:'POST',
        data:{field:$field, value:$value},
        dataType:'json',
        error: err=>{
            console.error(err)
            $(`[name="${$field}"]`).addClass('is-invalid')
            $(`[name="${$field}"]`).closest('.err_msg').text("An error occurred while validating the data.")
            $(`[name="${$field}"]`).closest('.input-field').addClass('d-none')
        },
        success:function(resp){
            if(resp.status == 'success'){
                $(`[name="${$field}"]`).addClass('is-valid')
                $(`[name="${$field}"]`).siblings('.err_msg').text('');
            }else if(resp.status == 'failed'){
                $(`[name="${$field}"]`).addClass('is-invalid')
                if(!!resp.error)
                    $(`[name="${$field}"]`).siblings('.err_msg').text(resp.error);
                else
                    $(`[name="${$field}"]`).siblings('.err_msg').text("The given value is invalid.");
            }else{
                $(`[name="${$field}"]`).addClass('is-invalid')
                $(`[name="${$field}"]`).closest('.err_msg').text("The given value is invalid.");
            }
            $(`[name="${$field}"]`).siblings('.input-loader').addClass('d-none')
            check_form_validity()
        }
    })
    
}

function check_form_validity(){
    if($('#memberForm .is-invalid').length > 0){
        $("#submit").attr('disabled', true)
    }else{
        $("#submit").attr('disabled', false)
    }
    $('#memberForm input[data-validate="true"]').each(function(){
        if($(this).hasClass('is-invalid'))
        return false;
    })
    if($('#memberForm input[data-validate="true"]').length == $('#memberForm .is-valid').length){
        $('#memberForm').addClass('was-validated')
    }
}

