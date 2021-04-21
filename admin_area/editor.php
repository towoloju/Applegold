<?php

      if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php', '_self')</script>";

    }else{
?>

<?php

        $file= "../styles/main.css";
        if(file_exists($file)){
            $data = file_get_contents($file);
        }
?>

<div class="row" style="margin-top:60px;">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i>   Dashboard / CSS Editor
            </li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-pencil"></i>  CSS Editor
                </h3>
            </div>

            <div class="panel-body">

                <form action="" class="form-horizontal" method="post">

                    <div class="form-group">
                        <div class="col-lg-12">
                            <textarea name="newdata" rows="15" class="form-control">
                                <?php echo $data; ?>
                            </textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3"></label>

                        <div class="col-md-6">
                            <input type="submit" name="update" value="Update CSS" class="form-control btn btn-primary">
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
        function editorUpdate(){
            Swal.fire({
                title: 'Udpated',
                text: 'CSS has beed updated successfully',
                icon: 'success'
            }).then(function(){
                window.location = 'index.php?editor'
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

        if(isset($_POST['update'])){
            $newdata = $_POST['newdata'];

            $handle = fopen($file, "w");

            fwrite($handle, $newdata);

            fclose($handle);


            echo "<script> editorUpdate(); </script>";

        }
?>


<?php
    }
?>