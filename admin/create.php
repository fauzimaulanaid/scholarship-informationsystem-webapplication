<!DOCTYPE HTML>  
    <html>
        <head>
            <link rel="icon" type="image/ico" href="../img/sing.png" />
            <title>Student Exchange Scholarship Form to Singapore</title>
            <link rel="stylesheet" href="../css/app.css" />
            <meta name="viewport" content="width=device-width, initial-scale=1">
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
        <div>  
            <div class="container">
            <div class="mid">
                <h1> Student Exchange Scholarship Form</h1> <h1 class="country">  to Singapore</h1>
            </div>
            <p><span class="error">* required field</span></p>
            <!-- FORM INPUT DATA -->
                <form method="post" id="regis" action="validation.php">
                    <div class="row">
                        <div class="col-25">
                            <label for="fname">Full Name</label>
                        </div>
                    <div class="col-75">
                        <input type="text" id="fname" name="name" placeholder="Please write your full name">
                        <span class="error">* </span>
                    </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label for="gender">Gender</label>
                        </div>
                    <div class="col-75">
                        <br>
                        <input type="radio" name="gender" value="Male">Male
                        <input type="radio" name="gender" value="Female">Female
                        <span class="error">* </span>
                    </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-25">
                            <label for="dob">Date of Birth</label>
                        </div>
                    <div class="col-75">
                        <input type="date" id="date" name="date" style="height:40px"">
                        <span class="error">* </span>
                    </div>
                    </div>
                    
                    <br>
                    
                    <div class="row">
                        <div class="col-25">
                            <label for="add">Address</label>
                        </div>
                            <div class="col-75">
                                <input type="text" id="aad" name="add" placeholder="Please write your address">    
                                <span class="error">* </span>
                            </div>
                    </div>
                    
                    <br>
                    
                    <div class="row">
                        <div class="col-25">
                            <label for="email">Email</label>
                        </div>
                            <div class="col-75">
                            <input type="text" id="email" name="email" placeholder="example@example.com">   
                            <span class="error">* </span>
                            </div>
                    </div>
                    
                    <br>
                    
                    <div class="row">
                        <div class="col-25">
                            <label for="phone">Phone Number</label>
                        </div>
                            <div class="col-75">
                            <input type="number" class="long" id="phone" name="phone" placeholder=" example : 083878299837">   
                            <span class="error">* </span>
                            </div>
                    </div>

                    <br>
                    
                    <div class="row">
                        <div class="col-25">
                            <label for="univ">From University</label>
                        </div>
                    <div class="col-75">
                        <input type="text" id="univ" name="univ" placeholder="Please write your university name">
                        <span class="error">* </span>
                    </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-25">
                            <label for="web"> Your University's Website</label>
                        </div>
                            <div class="col-75">
                            <input type="text" id="web" name="web" placeholder="www.example.com" style="height:60px">   
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
                                <option value="National University of Singapore (NUS)">National University of Singapore (NUS)</option>
                                <option value="Nanyang Technological University (NTU)">Nanyang Technological University (NTU)</option>
                                <option value="Singapore Management University (SMU)">Singapore Management University (SMU)</option>
                                <option value="Singapore Institute of Management (SIM)">Singapore Institute of Management (SIM)</option>
                                <option value="Singapore University of Technology and Design (SUTD)">Singapore University of Technology and Design (SUTD)</option>
                            </select>
                            <span class="error">*</span>
                        </div>
                        </div>

                    <br>
                    
                    <div class="row">
                         <input type="submit" name="submit" value="Submit">
                        <input type="button" onclick="resetFunction()" value="Reset Form">
                        <input type="button" onclick="window.location.href = 'crud.php';" value="Back to crud menu">
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