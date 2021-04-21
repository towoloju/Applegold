<?php

 
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php', '_self')</script>";

    }else{

   

?>

<?php

    if(isset($_GET['edit_term'])){

        $edit_term_id = $_GET['edit_term'];

        $edit_term = "select * from terms where term_id='$edit_term_id'";

        $run_edit_term = mysqli_query($con,$edit_term);

        $row_edit_term = mysqli_fetch_array($run_edit_term);

        $term_id = $row_edit_term['term_id'];

        $term_title = $row_edit_term['term_title'];

        $term_desc = $row_edit_term['term_desc'];

        $term_link = $row_edit_term['term_link'];






    }

?>

<div class="row " style="margin-top:60px;">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  Dashboard / Terms & Conditions
            </li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-pencil fa-fw"></i>  Edit Terms & Conditions </h3>
            </div>


            <div class="panel-body">
                <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> Terms Title</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" required name="term_title" value="<?php echo $term_title; ?>">

                        </div>

                    </div>


                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> Term URL</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" required name="term_link" value="<?php echo $term_link; ?>">

                        </div>

                    </div>


                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> Term Description</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" required name="term_desc" value="<?php echo $term_desc; ?>">

                        </div>

                    </div>



                    <div class="form-group">
                        <label for="" class="control-label col-md-3"></label>
                        <div class="col-md-6">
                             <input type="submit" name="submit" value="Update Terms & Conditions" class="btn btn-primary form-control">

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
        function termUpdate(){
            Swal.fire({
                title: 'Updated',
                text: 'Terms and Coditions updated successfully',
                icon: 'success'
            }).then(function(){
                window.location = 'index.php?view_terms'
            });
    
        }

        function error(){
            Swal.fire({
                title: 'Oops ...',
                text: 'Something went wrong',
                icon: 'error'
            })
        }
    </script>

<?php
    if(isset($_POST['submit'])){

        $term_title = $_POST['term_title'];

        $term_desc = $_POST['term_desc'];

        $term_link = $_POST['term_link'];

        $update_term = "update terms set term_title='$term_title ',  term_desc='$term_desc', term_link='$term_link'  where term_id=$term_id";

        $run_update_term = mysqli_query($con,$update_term);

        if($run_update_term){
            
            echo "<script> termUpdate(); </script>";

        }else{

            echo "<script> error(); </script>";

        }


    }
?>




<?php

    }
?>