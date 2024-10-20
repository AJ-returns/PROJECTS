<?php
  //connect to the database
  $servername="localhost";
  $username="root";
  $password="";
  $database="notes";

  $insert=false;
  $update=false;
  $delete=false;
  $showalert=false;
  


  //connection
  $conn=mysqli_connect($servername,$username,$password,$database);

  //die if connection not established
  if (!$conn) {
    die("Sorry! Connection failed".mysqli_connect_error());
  }
  if (isset($_GET['delete'])) {      //for delete(D) req method will be GET
    $sno=$_GET['delete'];
    // echo $sno;

    $sql="DELETE FROM `notes` WHERE `notes`.`S.N` = '$sno'";
    $result=mysqli_query($conn,$sql);
    if ($result) {
      $delete=true;
      $showalert=true;
    } else {
      $delete=false;
      $showalert=true;
    }
  }
  // echo var_dump($_POST);
  if ($_SERVER['REQUEST_METHOD']=="POST"){  //for create,read,update (CRU) req method will be POST
    if (isset($_POST['snoedit'])){
      // echo "yes";
      // update the record
      $sno=$_POST["snoedit"];
      $title=$_POST["titleedit"];
      $description=$_POST["descedit"];
      
      $sql="UPDATE `notes` SET `Title` = '$title', `Description` = '$description' WHERE `notes`.`S.N` = '$sno'";
      $result=mysqli_query($conn,$sql);
      if ($result) {
        $update=true;
        $showalert=true;
      } else {
        $update=false;
        $showalert=true;
      }
      // exit();
    }
    else if(isset($_POST['title']) && isset($_POST['desc'])){
        //insert records
      $title=$_POST["title"];
      $description=$_POST["desc"];

      $sql="INSERT INTO `notes` (`Title`, `Description`) VALUES ('$title', '$description')";
      $result=mysqli_query($conn,$sql);

      if ($result) {
        $insert=true;
        $showalert=true;
      } 
      else {
        $insert=false;
        $showalert=true;
      }
    }
  }

  ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  

    <title>iNotes-Notes taking made easy</title>
  </head>
  <body>
        <!-- edit modal -->
    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editmodal">
      Launch demo modal
    </button> -->

    <!-- edit Modal -->
    <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="editmodalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title fs-5" id="editmodalLabel">Edit Note</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="/Projects/crud/index.php" method="post">  

            <div class="modal-body">

              <!-- this returns the SN for update to work -->
              <input type="hidden" name="snoedit" id="snoedit"></input>

              <div class="mb-3">
                  <label for="title" class="form-label">Note title</label>
                  <input type="text" class="form-control" id="titleedit" name="titleedit" aria-describedby="emailHelp">
                  
              </div>
              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Note description</label>
                <textarea class="form-control" id="descedit"  name ="descedit" rows="3"></textarea>
              </div>
              
              <!-- <button type="submit" class="btn btn-primary">Update note</button> -->
               </div>
              <div class="modal-footer mb-3"><!--div ma mb-3 class  le update button detect garna help garxa so missing it here save chnages button was not working-->
                <button type="submit" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </form>
      </div>
    </div>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="/Projects/crud/index.php"><img src="https://www.php.net/images/logos/new-php-logo.png" height="37px" width="75px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/Projects/crud/index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact Us</a>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>

       <?php 
       if($showalert) {
       
        if ($insert) {
          echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
              <strong>Success!</strong> Your note has been added successfully.
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
          
        }
        else if ($update) {
          echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
              <strong>Success!</strong> Your note has been updated successfully.
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
        }
        else if ($delete) {
          echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
              <strong>Success!</strong> Your note has been deleted successfully.
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";  
        }
         else{
          echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Oops!</strong> Something went wrong.
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
      }
    }
      ?>



      <div class="container my-4" >

        <h2>Add a note</h2>
        <form action="/Projects/crud/index.php" method="post">  
          <!-- <input type="hidden" name="snoedit" id="snoedit"></input> -->
          <div class="mb-3">

            <label for="title" class="form-label">Note title</label>
            <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
            
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Note description</label>
            <textarea class="form-control" id="desc"  name ="desc" rows="3"></textarea>
          </div>
          
          <button type="submit" class="btn btn-primary">Add note</button>
        </form>
        <div class="container my-4">
                  <table class="table" id="mytable">
          <thead>
            <tr>
              <th scope="col">S.N</th>
              <th scope="col">Title</th>
              <th scope="col">Description</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
          <?php
            //query
            $sql="SELECT * FROM `notes`";
            $result=mysqli_query($conn,$sql);
            $sn=1;
            //fetching data
            while ($row=mysqli_fetch_assoc($result)) {
              echo " <tr>
              <th scope='row'>".$sn."</th>
              <td>".$row['Title']."</td>
              <td>".$row['Description']."</td>
              <td><button class='edit btn btn-sm btn-primary' id=".$row['S.N'].">Edit</button>
              <button class='delete btn btn-sm btn-primary' id=d".$row['S.N'].">Delete</button>
              </td>
            </tr>";
            $sn++;
            }
          ?>
          </tbody>

        </table>
          </div>
    </div>
    


    <!-- All scripts and stylesheets -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
   
    <script>
      //editing part
      // document.addEventListener("DOMContentLoaded", () => {
        const edits = document.getElementsByClassName('edit');
        
        Array.from(edits).forEach((element) => {
          element.addEventListener("click", (e) => {
            
            console.log("edit",);
            tr= e.target.parentNode.parentNode;
            title=tr.getElementsByTagName("td")[0].innerText;
            description=tr.getElementsByTagName("td")[1].innerText;
            console.log(title,description);

            descedit.value=description;
            titleedit.value=title;
            console.log(e.target.id);
            
            snoedit.value=e.target.id;
            
            $('#editmodal').modal('toggle');
          });
        });
      // });

      //deleting part
        // document.addEventListener("DOMContentLoaded", () => {
          const deletes = document.getElementsByClassName('delete');
        

        Array.from(deletes).forEach((element) => {
          element.addEventListener("click", (e) => {
            
            console.log("delete",);
           
            sno=e.target.id.substr(1,);
            if (confirm("Are you sure you want to delete?")) {
              console.log("yes"); 
              window.location=`/Projects/crud/index.php?delete=${sno}`;//use backticks and then dollar($) then curly bracket and use the variable name to  overally as a whole use it as variable
              //security loophole-anybody which provied the just above link can change or delete the data so need user request or authentication

              //TO DO : Create a form to use post request to submit a form
            }
            else{
              console.log("no");
            }
          });
        });
      // });
    </script>

<script>
  $(document).ready(function() {
    $('#mytable').DataTable();
  });
</script>

  </body>
  
</html>