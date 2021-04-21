<button id="success">clisk me</button>




<script src="js/jquery-3.4.1.min.js"></script>
  
    <script src="js/sweetalert2.all.min.js"></script>

 
    <script>
$('#success').on('click', function(){
    Swal.fire({
        type : 'Success',
        title: 'Hello',
        text: 'Passwords dont match'
    })
})

</script>