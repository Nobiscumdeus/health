<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chasfat|MBBS 2k26</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="mbbs.css" />

</head>
<body>
    <div id="container">
        <button id="mode-toggle" class="change"><i class='fa fa-paint-brush fa-1.5x' alt="Change"></i></i></button>
        <div id="start">
            <h3> UI MBBS 2k26</h3>
            <h5> Congrats to everyone who made it here. We are the group of elites! We're one
                We are a family and we are a team. Wishing success through our 6-year journey
            </h5>
        </div>
        
       
        <form action="process_form.php" method="POST" id="studentForm">
            <input type="text" name="name" id="name" placeholder="Enter your Full Names" required>
            <input type="text" name="birth" id="birth" placeholder="Birthday without Year e.g. JANUARY 21ST" required>
            <input type="text" name="state" id="state" placeholder="Your State of Origin e.g.  ONDO" required>
            <input type="text" name="nation" id="nation" placeholder="Enter Your Nationality e.g. Nigerian" required>
            <input type="text"  name="hobbies" id="hobbies" placeholder="Mention your Hobbies " required>
            <input type="tel"  name="contact" id="contact" placeholder="Enter a hotline you can be reached through: Optional">
            <input type="email" name="email" id="email" placeholder="Enter your email address : Optional">
            <!--
                 <input type="text" id="reason" placeholder="Why did you Chose Medicine ? " required>
            -->
           
            <textarea name="reason" name="reason" id="reason" cols="30" rows="7" placeholder="Why did you choose to study Medicine and why in University of Ibadan ?"></textarea>
            <button type="submit" name="submitButton" id="submitButton"> Submit your Details</button>
            
       
            
        </form>
        
        

    </div>
    <!--
    <button type="submit" id="displayButton">See MBBS 2k26 members ?</button>
    <div id="displaySection">

    </div>
-->
    <div id="foot">
        Chasfat Project$ &copy; 2023
    </div>
    <script>
         document.getElementById("mode-toggle").addEventListener("click",function(){
    document.body.classList.toggle("dark-mode");
    document.querySelector("#mode-toggle").classList.toggle('change');
})

        </script>
  
   
  
</body>
</html>