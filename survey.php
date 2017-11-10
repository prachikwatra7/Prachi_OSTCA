<!DOCTYPE html>
    <?php
   $error=false;
    $con= mysqli_connect("localhost","root","","coffeedb");
    if (isset($_POST['submit'])) //POST method will upload data.
{
	$name = mysqli_real_escape_string($con, $_POST['name']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$q1 = mysqli_real_escape_string($con, $_POST['q1']);
	$q2 = mysqli_real_escape_string($con, $_POST['q2']);
    $q3 = mysqli_real_escape_string($con, $_POST['q3']);
    $q4 = mysqli_real_escape_string($con, $_POST['q4']);
	
	//name can contain only alpha characters and space
	if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
		$error = true;
		$name_error = "Name must contain only alphabets and space";
	}
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		$error = true;
		$email_error = "Please Enter Valid Email ID";
	}
	
	}
	if (!$error) {
		if(mysqli_query($con, "INSERT INTO coffee(name,email,q1,q2,q3,q4) VALUES('" . $name . "', '" . $email . "', '" . $q1 . "', '" . $q2 . "', '" . $q3 . "', '" . $q4 . "')")) {
			$successmsg = "Successfully Registered!";
		} else {


			$errormsg = "Error in registering...Please try again later!";
		}
	}
}
  

    
    ?>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>Coffee Survey</title>
            <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
            <link href="project.css" rel="stylesheet" type="text/css">
        </head>
        <body>
            <header>
                <h1>All about COFFEE</h1>
            <nav>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="roasting.html">Roasting</a></li>
                    <li><a href="grinding.html">Grinding</a></li>
                    <li><a href="brewing.html">Brewing</a></li>
                    <li><a href="drinks.html">Drinks</a></li>
                    <li><a href="survey.html">CoffeeSurvey</a></li>
                </ul>
            </nav>
            </header>
            <h1>Coffee Survey</h1>
            <aside>
                <figure>
                    <img src="images/img12.jpg" alt="coffee cup image ">
                </figure>
            </aside>
            <form  role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform"></form> <!--action="survey.php" method="post"-->
                <fieldset>
                    <legend>Personal Information</legend>
                    <div class="form-group">
                    Your Name<br>
                    <input type="text" name="name" size="40"  value=" Your name" required value ="<?php if($error) echo $name;?>" class="form-control"/>
                    
                    <span class="text"><?php if (isset($name_error)) echo $name_error; ?></span> <br>
                    </div>
                    <div class="form-group">
                    Email Address<br>
                    <input type="email" name="email"  size="40" value="Your email" required value="<?php if($error) echo $email; ?>" class="form-control" /><br>
                    <span class="text"><?php if (isset($email_error)) echo $email_error; ?></span>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Your Coffee Preferences</legend>
                    <div class="form-group">
                    Tell us Your Coffee Preparation Methods<br>
                    <textarea name="q1" cols="40" rows="6" required value="<?php if($error) echo $q1; ?>"></textarea><br><br>
                  
                    </div>
                    Do you grind your own beans?<br>
                    <div class="form-group">
                    <input type="radio" name="q2" value="yes" required value="<?php if($error) echo $q2; ?>">Yes<br>
                    <input type="radio" name="q2" value="no" required value="<?php if($error) echo $q2; ?>">No<br>
              
                    </div>
                    <br>
                    <div class="form-group">
                    How do you drink your coffee?<br>
                    <input type="radio" name="q3" value="sugar" required value="<?php if($error) echo $q3; ?>">with sugar<br>
                    <input type="radio" name="q3" value="cream" required value="<?php if($error) echo $q3; ?>">with cream<br>
                  
                    </div>
                    <br>
                    <div class="form-group">
                    What is your favourite coffee drink?
                    <select name="q4">
                        <option value="">Please select a drink</option>
                        <option value="drip" required value="<?php if($error) echo $q4; ?>">drip coffee</option>
                        <option value="french" required value="<?php if($error) echo $q4; ?>">french press</option>
                        <option value="espresso" required value="<?php if($error) echo $q4; ?>">espresso</option>
                        <option value="latte" required value="<?php if($error) echo $q4; ?>">latte</option>
                        <option value="flavored" required value="<?php if($error) echo $q4; ?>">flavored</option>
                        
                    </select>
                    </div>
                </fieldset>
               <!-- <div class="form-group">
                <input type="submit" name="submit" value="submit" class="btn btn-primary">
                </div>-->
                <button onclick="myFunction()"> Submit</button>

<script>
function myFunction() {
    alert("Successfully Registered!");
    document.location.href='survey.php';
}
</script>

            </form>
            <span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
			<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
            <footer>
                <nav>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="roasting.html">Roasting</a></li>
                        <li><a href="grinding.html">Grinding</a></li>
                        <li><a href="brewing.html">Brewing</a></li>
                        <li><a href="drinks.html">Drinks</a></li>
                        <li><a href="survey.html">CoffeeSurvey</a></li>
                    </ul>
                </nav>
            </footer>
        </body>
         
     </html>