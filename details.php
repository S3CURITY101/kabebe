<?php require('header.php');?>
<?php require('action.php');?>



            <div class="container text-center">

                <div class="row justify-content-center">
                    <div class="col-md-6 mt-3 bg-info p-4 rounded">
                            <h2 class="bg-light p-2 rounded text-center text-dark">KABEBE IMAGE</h2>
                        <div class="text-center p-3">
                            <img src="<?= $vphoto; ?>" width="500" alt="picture" class="img-thumbnail">
                        </div>
                                <h4 class="text-dark p-2 rounded bg-light"><?= $vname ?></h4>
                                <h4 class="text-dark p-2 rounded bg-light"><?= $vemail ?></h4>
                                <h4 class="text-dark p-2 rounded bg-light"><?= $vmobile ?></h4>

                                
                   
                    
                </div>
               
            </div>





<?php require('footer.php');?>