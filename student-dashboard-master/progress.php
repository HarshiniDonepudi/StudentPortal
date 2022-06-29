<?php
/**** Copyright Christine Coomans ****/
/**** https://github.com/christinec-dev *******/
?>

<!------- Initialises Session ------->
<?php 
//if user is logged in, start session
if(!isset($_SESSION['IS_LOGIN'])){ 
    session_start(); 
    //include database configuration
    include_once('config.php');
    //set session "id" as username
    $username=$_SESSION['username'];
    
    //selects everything from xyz_students table that is relevant to the username's row
    $query=mysqli_query($con,"SELECT * FROM `xyz_students` WHERE username='$username'");
    //will fetch the student id and firstname from respective row
    while($row = mysqli_fetch_row($query)) {
        $stid = $row[0];
        $firstname = $row[4];
    }
    
    //selects everything from xyz_account table
    $queryTwo=mysqli_query($con,"SELECT * FROM `xyz_account`");
    //will return the balance, due date and attendance per row
    while($row = mysqli_fetch_row($queryTwo)) {
        $balance = $row[0];
        $due = $row[1];
        $attendance = $row[2];
    }

    //will get the first module from the xyz_results table
    $moduleOne=mysqli_query($con,"SELECT * FROM `xyz_results` LIMIT 1");
    //will return the module name and result
    while($row = mysqli_fetch_row($moduleOne)) {
       $s1 = $row[0];
       $m1 = $row[1];
    }

    //will get the second module from the xyz_results table
    $moduleTwo=mysqli_query($con,"SELECT * FROM `xyz_results` LIMIT 2");
    //will return the module name and result
    while($row = mysqli_fetch_row($moduleTwo)) {
       $s2 = $row[0];
       $m2 = $row[1];
    }

    //will get the third module from the xyz_results table
    $moduleThree=mysqli_query($con,"SELECT * FROM `xyz_results` LIMIT 3");
    //will return the module name and result
    while($row = mysqli_fetch_row($moduleThree)) {
       $s3 = $row[0];
       $m3 = $row[1];
    }
    
    //will get the fourth module from the xyz_results table
    $moduleFour=mysqli_query($con,"SELECT * FROM `xyz_results` LIMIT 4");
    //will return the module name and result
    while($row = mysqli_fetch_row($moduleFour)) {
       $s4 = $row[0];
       $m4 = $row[1];
    }

    //will get the fifth module from the xyz_results table
    $moduleFive=mysqli_query($con,"SELECT * FROM `xyz_results` LIMIT 5");
    //will return the module name and result
    while($row = mysqli_fetch_row($moduleFive)) {
       $s5 = $row[0];
       $m5 = $row[1];
    }
}

//if user is not logged session, return to login.php
if(!isset($_SESSION['IS_LOGIN'])){ 
	header('Location: login.php'); 
	die(); 
} 
?> 




<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> progress</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <!-- common external css file -->
  <link rel="stylesheet" href="css/common.css" />


  <!-- external css for this page-->
  <link rel="stylesheet" href="css/progress.css" />

  <!--font awesome-->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

</head>

<body>

  <!-- nav bar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <abbr title="Go to the home page"><a class="navbar-brand logoMiniguru" href="#">Student Portal</a></abbr>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <form class="form-inline my-2 my-lg-0 ">
          <input class="form-control form-control-dark searchBar" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-primary" style="background-color:#cc5500; border:none;">search</button>
        </form>

        <li class="nav-item dropdown userPhoto">
          <a class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user" style="font-size:2rem;color:#fff;"></i>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#"><i class="fas fa-home"></i> Home</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="yourvideos.html"><i class="fas fa-video"></i> Your videos</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="settings.html"><i class="fas fa-cog"></i> Account Settings</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#"><i class="fas fa-question-circle"></i> Help</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt"></i> SignOut</a>
          </div>
        </li>
        <li class="nav-item bell">
          <a class="nav-link " href="#"><i class="fas fa-bell" style="font-size:2rem;color:#fff;"></i></a>
        </li>
      </ul>

    </div>
  </nav>

  <!-- vertical menu for dshboard planner materials upload and wallet -->

  <input type="checkbox" id="check">
  <label for="check">
    <i class="fas fa-bars" id="btn"></i>
    <i class="fas fa-times" id="cancel"></i>
  </label>
  <section id="sideMenu">
    <nav>
    <a href="dashboard1.php" class="active"><i class="fas fa-tachometer-alt-slowest" style="font-size:1.4rem; padding-right: 1rem; color:#cc5500;"></i>Dashboard</a>
      <hr /><a href="planner.html"> <i class="fas fa-mind-share" style="font-size:1.4rem; padding-right: 1rem; color:#cc5500;"></i>Planner</a>
      <hr /><a href="materials.html"><i class="fas fa-hammer" style="font-size:1.4rem; padding-right: 1rem; color:#cc5500;"></i> Materials </a>
      <hr /><a href="upload.html"> <i class="fas fa-upload" style="font-size:1.4rem; padding-right: 1rem; color:#cc5500;"></i>Assignments </a>
      <hr /><a href="wallet.php"> <i class="fas fa-wallet" style="font-size:1.4rem; padding-right: 1rem; color:#cc5500;"></i> Fee Payment</a>
      <hr /><a href="progress.php" class="active"> <i class="fas fa-chart-bar" style="font-size:1.4rem; padding-right: 1rem; color:#cc5500;"></i> Results</a>
      <hr /><a href="ideas.html"> <i class="fa fa-pencil" aria-hidden="true" style="font-size:1.4rem; padding-right: 1rem; color:#cc5500;"></i> Exams</a>
      <hr /><a href="attendence.php"> <i class="fa fa-check" aria-hidden="true"style="font-size:1.4rem; padding-right: 1rem; color:#cc5500;"></i> Attendence</a>
      <hr /><a href="logout.php"> <i class="fa fa-sign-out" aria-hidden="true" style="font-size:1.4rem; padding-right: 1rem; color:#cc5500;"></i> Logout</a>
    </nav>

  </section>

  <!-- this is progress section-->
  <div class="row progress-section">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="progressdiv">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col" class="colm">Student ID</th>
              <th scope="col" class="colm">Student Name</th>
              <th scope="col" class="colm">Semester</th>
              <th scope="col" class="colm">CGPA</th>
              <th scope="col" class="colm">Results</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?php echo $stid?></td>
              <td><?php echo $firstname?></td>
              <td><br/>
                <?php echo $s1?><br/>
                            </td>
                            <td><br/>
                <?php echo $m1?><br/>
                            </td>
              <td><a href="#">View</a></td>

            </tr>
            <tr>
              <td><?php echo $stid?></td>
              <td><?php echo $firstname?></td>
              <td><br/>
                <?php echo $s2?><br/>
                            </td>
                            <td><br/>
                <?php echo $m2?><br/>
                            </td>
              <td><a href="#">View</a></td>

            </tr>
            <tr>
              <td><?php echo $stid?></td>
              <td><?php echo $firstname?></td>
              <td><br/>
                <?php echo $s3?><br/>
                            </td>
                            <td><br/>
                <?php echo $m3?><br/>
                            </td>
              <td><a href="#">View</a></td>

            </tr>
            <tr>
              <td><?php echo $stid?></td>
              <td><?php echo $firstname?></td>
              <td><br/>
                <?php echo $s4?><br/>
                            </td>
                            <td><br/>
                <?php echo $m4?><br/>
                            </td>
              <td><a href="#">View</a></td>

            </tr>
            <tr>
              <td><?php echo $stid?></td>
              <td><?php echo $firstname?></td>
              <td><br/>
                <?php echo $s5?><br/>
                            </td>
                            <td><br/>
                <?php echo $m5?><br/>
                            </td>
              <td><a href="#">View</a></td>

            </tr>
            <tr>
              <td>6</td>
              <td></td>
              <td></td>
              <td></td>

            </tr>
            <tr>
              <td>7</td>
              <td></td>
              <td></td>
              <td></td>

            </tr>
            <tr>
              <td>8</td>
              <td></td>
              <td></td>
              <td></td>

            </tr>
            <tr>
              <td>9</td>
              <td></td>
              <td></td>
              <td></td>

            </tr>
          </tbody>
        </table>
      </div>

    </div>

  </div>
 
                   <form action="" method="post" class="dash-form" style="padding-right: 58px; margin-top: -40px;">
                        <!--------- Academic Record Request autmatically ----------->
                        <input style="margin-left:1200px;margin-top:40px;   background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  background-color:#cc5500;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;" type="submit" class="btn btn-request" value="Request Academic Record" name="button_pressed"onclick/>
                    </form>
                    <!--------- Above input will automatically send the email to the RGIT Results Department ----------->
                    <?php
                        if(isset($_POST['button_pressed']))
                        {
                            $to      = 'someone@results.com';
                            $subject = 'Academic Record Request';
                            $message = 'Student with ID '. $stid . ' has requested their Academic Record. Please respond back.';
                            $headers = 'From: someone@results.com' . "\r\n" .
                                'Reply-To: someone@results.com' . "\r\n" .
                                'X-Mailer: PHP/' . phpversion();
                            mail($to, $subject, $message, $headers);
                            echo 'Email Sent.';
                        }
                    ?>
                


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>
