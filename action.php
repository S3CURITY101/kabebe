<?php
require_once('config.php');
 session_start();
        $update = false;
        $id="";
        $name = "";
        $email = "";
        $mobile = "";
        $photo ="";


    if(isset($_POST['add'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $photo = $_FILES['photo']['name'];
        $upload="uploads/".$photo;

        $query ="INSERT INTO bebe(name,email,mobile,photo)VALUES(?,?,?,?)";
        $stmt = $con->prepare($query);
        $stmt -> bind_param("ssss",$name,$email,$mobile,$upload);
        $stmt -> execute();
        move_uploaded_file($_FILES['photo']['tmp_name'], $upload);
         
        header("location:index.php");
        $_SESSION['response'] = "Sucessfully Inserted your BEBE";
        $_SESSION['res_type'] = "success";


    }

    if(isset($_GET['delete'])){
        $id=$_GET['delete'];

        $sql="SELECT photo FROM bebe WHERE id=?";
        $stmt2=$con->prepare($sql);
        $stmt2->bind_param("i",$id);
        $stmt2->execute();
        $result2=$stmt2->get_result();
        $row=$result2->fetch_assoc();
        $imagepath=$row['photo'];
        unlink($imagepath);
       

        $query ="DELETE FROM bebe WHERE id=?";
        $stmt=$con->prepare($query);
        $stmt->bind_param("i",$id);
        $stmt->execute();

      
      

        header("location:index.php");
        $_SESSION['response'] = "Sucessfully Deleted your BEBE";
        $_SESSION['res_type'] = "danger";
    }

    if(isset($_GET['edit'])){
        $id=$_GET['edit'];

        $query ="SELECT * FROM bebe WHERE id=?";
        $stmt=$con->prepare($query);
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $result=$stmt->get_result();
        $row=$result->fetch_assoc();

        $id=$row['id'];
        $name = $row['name'];
        $email = $row['email'];
        $mobile = $row['mobile'];
        $photo = $row['photo'];

     
        $update = true;

        }

    if(isset($_POST['update'])){
            
            $id=$_POST['id'];
            $name =$_POST['name'];
            $email =$_POST['email'];
            $mobile =$_POST['mobile'];
            $oldphoto = $_POST['oldphoto'];
    

            if(isset($_FILES['photo']['name'])&&($_FILES['photo']['name']!="")){
                $newimage ="uploads/".$_FILES['photo']['name'];
                unlink($oldphoto);
                move_uploaded_file($_FILES['photo']['tmp_name'], $newimage);
            }else{
                 $newimage=$oldphoto;
                
            }
            $query="UPDATE bebe SET name=?,email=?,mobile=?,photo=? WHERE id=?";
            $stmt = $con->prepare($query);
            $stmt ->  bind_param("sssss",$name,$email,$mobile,$newimage,$id);
            $stmt -> execute();


            header("location:index.php");
            $_SESSION['response'] = "Sucessfully Updated your BEBE";
            $_SESSION['res_type'] = "primary";
            }

            if(isset($_GET['details'])){
                $id=$_GET['details'];
        
                $query ="SELECT * FROM bebe WHERE id=?";
                $stmt=$con->prepare($query);
                $stmt->bind_param("i",$id);
                $stmt->execute();
                $result=$stmt->get_result();
                $row=$result->fetch_assoc();
        
                $vid=$row['id'];
                $vname = $row['name'];
                $vemail = $row['email'];
                $vmobile = $row['mobile'];
                $vphoto = $row['photo'];
        
             
              
        
                }
?>