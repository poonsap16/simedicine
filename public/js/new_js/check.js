$('#sap_id').on('change',function(){
    $('#sap_error').html('')
    document.getElementById("sap_id").style.borderColor = "";
});
$('#document_id').on('change',function(){
    $('#document_error').html('')
    document.getElementById("document_id").style.borderColor = "";
});
function check(){
    var sap_id = $('#sap_id').val();
    var document_id = $('#document_id').val();
    if( sap_id == ""){
        document.getElementById("sap_id").style.borderColor = "red";
        $('#sap_error').html('กรุณากรอกเลข SAP');
    }else if(sap_id.length != 8){
        document.getElementById("sap_id").style.borderColor = "red";
        $('#sap_error').html('SAP ไม่ถูกต้อง');
    }else if( document_id ==""){
        document.getElementById("document_id").style.borderColor = "red";
        $('#document_error').html('กรุณากรอกเลขเลขบัตรประชาชน');
    }else if( document_id.length != 13){
        document.getElementById("document_id").style.borderColor = "red";
        $('#document_error').html('เลขบัตรประชาชนไม่ถูกต้อง');
    }
    else{
    $('#button').button('loading');
        $.ajax({
                    type: 'POST',
                    data: {
                    '_token' : $('#token').val(),
                    'sap_id': $('#sap_id').val(),
                    'document_id': $('#document_id').val(),
                    
                },
                success: function(data) {
                   console.log(data); 
                   if (data == 0 || data['reply_code'] ==1 )   {
                       alert('ข้อมูลไม่ถูกต้อง');
                   }else{
                    $("#flip").slideUp();
                    $("#panel").slideDown("slow");    
                   }   
                },
        error: function(){ },
        url: '/query-sap-id',
        cache:false
        });
    }
}

