<?php

 
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php', '_self')</script>";

    }else{

   

?>
<div class="row " style="margin-top:60px;">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  Dashboard / Create Terms & Conditions
            </li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-table fa-fw"></i>  Create Terms & Conditions </h3>
            </div>


            <div class="panel-body">
                <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> Terms Title</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" required name="term_title">

                        </div>

                    </div>

         

                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> Terms URL</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" required name="term_link">

                        </div>

                    </div>

                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> Terms Description</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" required name="term_desc">

                        </div>

                    </div>


                    <div class="form-group">
                        <label for="" class="control-label col-md-3"></label>
                        <div class="col-md-6">
                             <input type="submit" name="submit" value="Insert Terms & Conditions" class="btn btn-primary form-control">

                        </div>
                    </div>  
                </form>
            </div>
        </div>
    </div>
</div>




    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>

    <script >
        function termSuccess(){
            Swal.fire({
                title: 'Successful',
                text: 'Terms and Conditions created successfully',
                icon: 'success'
            }).then(function(){
                window.location = 'index.php?view_terms'
            });
    
        }



        function error(){
            Swal.fire({
                title: 'Oops',
                text: 'Something went wrong',
                icon: 'info'
            })
        }

    </script>



<?php
    if(isset($_POST['submit'])){

        $term_title = $_POST['term_title'];

        $term_desc = $_POST['term_desc'];

        $term_link = $_POST['term_link'];

        $insert_term = "insert into terms (term_title,term_link, term_desc) values ('$term_title', '$term_link','$term_desc')";

        $run_term = mysqli_query($con,$insert_term);

        if($run_term){

            echo "<script> termSuccess(); </script>";
        }else{
            echo "<script> error(); </script>";

        }







    }
?>




<?php

    }
?>