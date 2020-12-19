<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="../css/login.css" />
    <link rel="icon" href="../img/sing.png">
        <title> Register Page - Fauzi Scholarship Website </title>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-show-password/1.0.3/bootstrap-show-password.min.js"></script> -->
        <script type="text/javascript" src="../js/jquery.min.js"></script>
        <script type="text/javascript" src="../js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../js/bootstrap-show-password.min.js"></script>
            <script type='text/javascript'>
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
                </script>
    </head>

    <body>

        <form action="validationregister.php" method="post">
            <div class="content">
                <br>
                <h3>REGISTER</h3>
                <br>
                <input name="name" type="text" placeholder="Please input your full name" class="form-control">
                <br>
                <input name="username" type="text" placeholder="Username (Only lowercase and number allowed)" class="form-control">
                <br>
                <select id="role" name="userrole" style="width:340px;height:30px" class="form-control">
                    <option value="">Please choose one user role</option>
                    <option value="administrator">Administrator</option>
                    <option value="viewer">Viewer</option>
                </select>
                <br>
                <input name="password" type="password" id="password" placeholder="Please input password" id="pass" onKeyUp="passwordStrength(this.value)" class="form-control" data-toggle="password">
                <!-- <input type="password" placeholder="Please input your password" name="password" id="pass" onKeyUp="passwordStrength(this.value)"/> -->
                <br>
                <div id="passwordDescription">Password does not exist yet</div>
                <div id="passwordStrength" class="strength0"></div> 
                <hr>
                <br>
                <button class="button" name="submit" id="submit">Register</button> &nbsp;&nbsp;&nbsp; <button class="button" input type="reset" name="reset" id="reset">Reset</button> 
                <br>
                <br>
                <p>Do you already have an account? Please login <?php echo "<a href=\"javascript:history.go(-1)\">Here</a>"; ?></p>
            </div>
        </form>
        <br>
        <br>
    </body> 
    <style>
        /* BUTTON PELANGI */
        .buttonz{
        display:inline-flex;
        border-radius:4px;
        cursor:pointer;
        font-size:13px;
        font-weight:bold;
        text-transform:uppercase;
        color:#FFF!important;
        background:url(http://1.bp.blogspot.com/-8ajTcOaRwVU/VJ_Z9jExy2I/AAAAAAAAAwg/b-ae25VRCHM/s1600/rainbow.png);
        background-size:cover;
        padding:3px 12px;
        text-shadow:none;
        transition:all 1s;
        }
        .buttonz:hover, .buttonz:hover, .buttonz.link:hover {
        box-shadow: 0px 0px 18px 18px rgba(80, 80, 80, 0);
        } 
        </style>
        <style>
        hr {border-top:solid 1px #eee; margin-top:20px; margin-bottom:10px;}
        #passwordDescription { color:#fff;}
        #passwordStrength{height:10px;display:block;float:left;}
        .strength0{width:20px;background:#fff;}
        .strength1{width:100px;background:#ff0000;}
        .strength2{width:200px; background:#ff5f5f;}
        .strength3{width:250px;background:#56e500;}
        .strength4{background:#4dcd00;width:300px;}
        .strength5{background:#399800;width:350px;}
        </style>   
        <style>
        body{ 
            /* background-color: #fed330; */
            background-image: url('../img/bg.jpg');
            background-size: 100% 125%;
            margin:0px; 
            padding:0px;
            text-align: center;
            align-items: center;
            align-content: center;
            }
        h3 {font-family:Arial, Helvetica, sans-serif; font-size:20px; text-align:center; color:#fff;}
        </style>

    <footer>
        <p><b>&copy; 2020 Muhammad Fauzi Maulana. All rights reserved.</b><p>
    </footer>
    <br>

</html>
