$(document).ready(function(){
    $(document).on('click', '#ipModal', function(){
        var id=$(this).val();
        var ip=$('#ip'+id).text();

       // $('#edit').modal('show');
        $('#ip').val(ip);
    });
});