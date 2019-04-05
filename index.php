<?php include 'header.php';?>
<?php include 'action.php' ;
 $result = mysqli_query($con, "SELECT * FROM bebe ORDER BY id DESC");

?>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 text-center p-2">
                <h3 class="text-center text-dark p-1">ADVANCE WAG BOBO INSIDE CRUD (OBJECT ORIENTED)</h3>
                <hr>
                <?php if(isset($_SESSION['response'])){ ?>
                    <div class="alert alert-<?= $_SESSION['res_type']; ?> 
                    alert-dismissible text-center">
                        <button class="close" type="button" data-dismiss="alert"> &times;
                        </button>
                        <b class="text-center"><?= $_SESSION['response']; ?></b> 
                    </div>
                <?php } unset($_SESSION['response']);?>
            </div>
            <div class="col-md-4">
                <h3 class="text-center text-info">ADD KABEBE</h3>
                <form action="action.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $id; ?>">
                    <div class="form-group">
                        <input type="text" name="name" value="<?= $name; ?>"class="form-control" placeholder="ENTER YOUR KABEBE HERE" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $email; ?>"class="form-control" placeholder="ENTER YOUR KABEBE EMAIL" pattern="/^([a-zA-Z0-9_.+])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4}+$/" required>
                    </div>
                    <div class="form-group">
                        <input type="tel" name="mobile" value="<?= $mobile; ?>" class="form-control" placeholder="ENTER YOUR KABEBE CONTACT" required>
                    </div>
                  
                    <div class="form-group">
                        <input type="hidden" name="oldphoto" value="<?= $photo; ?>">
                        <input type="file" name="photo" value="<?= $photo; ?>"class="custom-file">
                        <img src="<?=$photo;?>" width="500" class="img-thumbnail">
                    </div>
                    <div class="form-group">
                        <?php if($update == true){?>
                            <input type="submit" name="update" class="btn btn-success btn-block" value="Update Record">
                        <?php } else{?>
                            <input type="submit" name="add" class="btn btn-primary btn-block" value="Add Record">
                            <?php } ?>
                        </div>
                </form>
                

                </div>
                    <div class="col-md-8">
                         <h3 class="text-center text-info">RECORD NG MGA KABEBE</h3>
                          <table class="table table-hover">
                              <thead>
                                  <tr>
                                      <th>#</th>
                                      <th>IMAGE</th>
                                      <th>NAME</th>
                                      <th>EMAIL</th>
                                      <th>CONTACT</th>
                                      <th>ACTION</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php while($row=$result->fetch_assoc()){?>

                                    <tr>
                                        <td><?= $row['id'];?></td>
                                        <td><img src="<?= $row['photo'];?>" width="50"></td>
                                        <td><?= $row['name'];?></td>
                                        <td><?= $row['email'];?></td>
                                        <td><?= $row['mobile'];?></td>

                                        <td>
                                            <a href="details.php?details=<?= $row['id'];?>" class="badge badge-primary p-3">DETAILS</a>
                                            <a href="action.php?delete=<?= $row['id'];?>" class="badge badge-danger p-3" onclick="return confirm('Do you want to tanggal this?');">DELETE</a>
                                            <a href="index.php?edit=<?= $row['id'];?>" class="badge badge-success p-3">EDIT</a>
                                        </td>
                                    </tr>

                              
                                  <?php }?>
                              </tbody>
                          </table>
                    </div>
        </div>
    </div>


<?php require('footer.php');?>
