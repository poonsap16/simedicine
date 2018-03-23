<script> 
function check(){
    var sap_id = $('#sap_id').val();
    var document_id = $('#document_id').val();
    if( sap_id == "" || sap_id.length != 8){
        // alert ('SAP ไม่ถูกต้อง');
        $('#error').html('SAP ไม่ถูกต้อง');
    }else if( document_id =="" || document_id.length != 13){
        alert('เลขบัตรไม่ถูกต้อง');
    }
    else{
    $('#button').button('loading');
        $.ajax({
                    type: 'POST',
                    data: {
                    '_token' : '{{ csrf_token()}}',
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

@if (session('status') )
$("#flip").hide();
$("#panel").show();
@endif
</script>