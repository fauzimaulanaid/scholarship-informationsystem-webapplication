<!DOCTYPE HTML>  
    <html>
        <head>
            <link rel="icon" type="image/ico" href="../img/sing.png" />
            <title>Student Exchange Scholarship Update Data Form</title>
            <link rel="stylesheet" href="../css/app.css" />
        </head>
    <body> 
    <?php 
        session_start();
    
        // cek apakah yang mengakses halaman ini sudah login
        if($_SESSION['userrole']==""){
            header("location:../index.php?message=loginfirst");
        }
        if($_SESSION['userrole']=="viewer"){
            header("location:../viewer/view.php?message=notadmin");
        }
    
    ?>
    <?php
    // include database connection file
    include ("../db_connect.php");
    // Display selected user data based on id
    // Getting id from url
    $id = $_GET['participant_id'];

    // Fetech user data based on id
    $result = mysqli_query($con, "SELECT * FROM participant WHERE participant_id = $id");

    while($row = mysqli_fetch_assoc($result))
    {
        $name = $row['full_name'];
        $gender = $row['gender'];
        $date = $row['dob'];
        $add = $row['p_address'];
        $email = $row['email'];
        $phone = $row['phone'];
        $univ = $row['university'];
        $web = $row['university_web'];
        $sg = $row['university_sg'];
    }

    $check = "";
    $check1 = "";
    if($gender == "Male"){
        $check = "checked";
    }else{
        $check1 = "checked";
    }

    $opt1 = "";
    $opt2 = "";
    $opt3 = "";
    $opt4 = "";
    $opt5 = "";

    if($sg == "National University of Singapore (NUS)"){
        $opt1 = "selected";
    } if($sg == "Nanyang Technological University (NTU)"){
        $opt2 = "selected";
    } if($sg == "Singapore Management University (SMU)"){
        $opt3 = "selected";
    } if($sg == "Singapore Institute of Management (SIM)"){
        $opt4 = "selected";
    } if($sg == "Singapore University of Technology and Design (SUTD)"){
        $opt5 = "selected";
    }

    ?>
        <div>  
            <div class="container">
            <div class="mid">
                <h1> Student Exchange Scholarship Update Data Form</h1>
            </div>
            <p><span class="error">* required field</span></p>
            <!-- FORM INPUT DATA -->
                <form method="post" id="regis" action="validationupdate.php">
                    <div class="row">
                        <div class="col-25">
                            <label for="fname">Full Name</label>
                        </div>
                    <div class="col-75">
                        <input type="text" id="fname" name="name" placeholder="Please write your full name" value="<?php echo $name;?>">
                        <span class="error">* </span>
                    </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label for="gender">Gender</label>
                        </div>
                    <div class="col-75">
                        <br>
                        <input type="radio" name="gender" value="Male" <?php echo $check;?>>Male
                        <input type="radio" name="gender" value="Female" <?php echo $check1;?>>Female
                        <span class="error">* </span>
                    </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-25">
                            <label for="dob">Date of Birth</label>
                        </div>
                    <div class="col-75">
                        <input type="date" id="date" name="date" style="height:40px"  value="<?php echo $date;?>">
                        <span class="error">* </span>
                    </div>
                    </div>
                    
                    <br>
                    
                    <div class="row">
                        <div class="col-25">
                            <label for="add">Address</label>
                        </div>
                            <div class="col-75">
                                <input type="text" id="aad" name="add" placeholder="Please write your address" value="<?php echo $add;?>">    
                                <span class="error">* </span>
                            </div>
                    </div>
                    
                    <br>
                    
                    <div class="row">
                        <div class="col-25">
                            <label for="email">Email</label>
                        </div>
                            <div class="col-75">
                            <input type="text" id="email" name="email" placeholder="example@example.com" value="<?php echo $email;?>">   
                            <span class="error">* </span>
                            </div>
                    </div>
                    
                    <br>
                    
                    <div class="row">
                        <div class="col-25">
                            <label for="phone">Phone Number</label>
                        </div>
                            <div class="col-75">
                            <input type="number" class="long" id="phone" name="phone" placeholder=" example : 083878299837" value="<?php echo $phone;?>">   
                            <span class="error">* </span>
                            </div>
                    </div>

                    <br>
                    
                    <div class="row">
                        <div class="col-25">
                            <label for="univ">From University</label>
                        </div>
                    <div class="col-75">
                        <input type="text" id="univ" name="univ" placeholder="Please write your university name" value="<?php echo $univ;?>">
                        <span class="error">* </span>
                    </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-25">
                            <label for="web"> Your University's Website</label>
                        </div>
                            <div class="col-75">
                            <input type="text" id="web" name="web" placeholder="www.example.com" style="height:60px" value="<?php echo $web;?>">   
                            <span class="error"></span>
                            </div>
                    </div>
                    
                    <br>
                    
                    <div class="row">
                        <div class="col-25">
                            <label for="sg">University That You Choose</label>
                        </div>
                        <div class="col-75">
                            <select id="sg" name="sg" style="height:60px">
                                <option value="">Please choose one</option>
                                <option value="National University of Singapore (NUS)" <?php echo $opt1;?>>National University of Singapore (NUS)</option>
                                <option value="Nanyang Technological University (NTU)" <?php echo $opt2;?>>Nanyang Technological University (NTU)</option>
                                <option value="Singapore Management University (SMU)" <?php echo $opt3;?>>Singapore Management University (SMU)</option>
                                <option value="Singapore Institute of Management (SIM)" <?php echo $opt4;?>>Singapore Institute of Management (SIM)</option>
                                <option value="Singapore University of Technology and Design (SUTD)" <?php echo $opt5;?>>Singapore University of Technology and Design (SUTD)</option>
                            </select>
                            <span class="error">*</span>
                        </div>
                        </div>

                    <br>
                    
                    <div class="row">
                        <input type="hidden" name="participant_id" value=<?php echo $_GET['participant_id'];?>>
                        <input type="submit" name="submit" value="Update">
                        <input type="button" onclick="resetFunction()" value="Reset Data">
                        <input type="button" onclick="window.location.href = 'crud.php';" value="Cancel">
                    </div>
                    <br>
                </form>

        <br>
        <br>
        <br>
        <br>
        <script src="../js/app.js"></script>
    </body>
        <div class="mid">
            <footer>
                Copyright &copy; 2020 Muhammad Fauzi Maulana. All rights reserved.
            </footer>
        </div>
    </div>
</html>