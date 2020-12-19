<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="css/login.css" />
    <link rel="icon" href="img/sing.png">
        <title> Login Page - Fauzi Scholarship Website</title>

        <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/bootstrap-show-password.min.js"></script>
        
            <!-- <script type='text/javascript'>
                var intval = null;
                var pos = 0;
                $(document).ready(function() {
                    intval = window.setInterval(moveBg, 70);
                });

                function moveBg() {
                    pos++; 
                    $('.buttonz').css({backgroundPosition: (pos * 1) + '% 1px'});
                }
                </script> 
                <script>
                    function passwordStrength(password){
                    var desc = new Array();
                    desc[0] = "Very Weak";
                    desc[1] = "Weak";
                    desc[2] = "Good";
                    desc[3] = "Strong";
                    desc[4] = "Very Strong";
                    desc[5] = "Perfect";
                    
                    var score = 0;
                    if (password.length > 6) score++;
                    
                    //if password has both lower and uppercase characters give 1 point 
                    if ( ( password.match(/[a-z]/) ) && ( password.match(/[A-Z]/) ) ) score++;
                    if (password.match(/\d+/)) score++;
                    if ( password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) ) score++;
                    if (password.length > 12) score++;
                    
                    document.getElementById("passwordDescription").innerHTML = desc[score];
                    document.getElementById("passwordStrength").className = "strength" + score;
                    }
                </script> -->
    </head>

    <body>

        <?php 
            session_start();

            session_destroy();

            if(isset($_GET['message'])){
                if($_GET['message']=="loginerror"){
                    echo "<div class='alert'>Incorrect Username or Password!!!!</div>";
                }
            }
            if(isset($_GET['message'])){
                if($_GET['message']=="loginfirst"){
                    echo "<div class='alert'>Please login first!!!</div>";
                }
            }
            if(isset($_GET['message'])){
                if($_GET['message']=="requiredfield"){
                    echo "<div class='alert'>Username and Password Required!!!</div>";
                }
            }
        ?>
        <br>
        <br>
        <form action="login.php" method="post">
            <div class="content">
                <br>
                <h3>LOGIN</h3>
                <br>
                <input type="text" placeholder="Please write your username correctly" name="username" class="form-control">
                <!-- <input type="text" placeholder="Please write your username correctly" name="username"> -->
                <br>
                <!-- <input type="password" placeholder="Please write your password correctly" name="password"> -->
                <input type="password" id="password" placeholder="Please write your password correctly" name="password" class="form-control" data-toggle="password">
                <hr>
                <button class="button" name="submit" id="submit">Login</button> &nbsp;&nbsp;&nbsp; <button class="button" input type="reset" name="reset" id="reset">Reset</button> 
                <br>
                <br>
                <p>Don't have an account? Please register your self <a href="user/register.php">Here</a></p>
            </div>
        </form>
        <br>
        <br>

    </body>

    <style>
        body{ 
            /* background-color: #fed330; */
            background-image: url('img/bg.jpg');;
            background-size: 100% 120%;
            margin:0px; 
            padding:0px;
            text-align: center;
            align-items: center;
            align-content: center;
            }
        h3 {font-family:Arial, Helvetica, sans-serif; font-size:20px; text-align:center; color:#fff;}
    </style>  
    <footer>
        <p><b>&copy; 2020 Muhammad Fauzi Maulana. All rights reserved.</b></p>
    </footer>
    <br>

</html>
