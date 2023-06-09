
<?php
ini_set('session.cookie_lifetime',1800); //1800 seconds is also 30 minutes 
ini_set('session.gc_maxlifetime',1800);

ini_set('session.gc_probability',1); //allows for garbage cleaning 
ini_set('session.gc_divisor',1);
session_start();


if(!isset($_SESSION['access']) || $_SESSION['access'] !== 'allowed'){
    header("Location:index.php");
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chasfat | MBBS 2k26 members </title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }
        body{
            min-height:100vh;
            display:flex;
            flex-direction:column;
            justify-content: center;
            align-items:center;
            /**
            background:#333;
            **/
            background:#2C3444;
            color:#fff;


        }
        #retrievebtn{
            
            flex-basis:50%;
            display:flex;
            flex-direction: column;
            padding:10px;
            border-radius:5px;
            background:#999;
            color:#000;
            font-weight:800;
            transition:1s ease-in;

            /**
            box-shadow:-15px -15px 15px #000,
                15px 15px 15px rgba(0,0,0,0.1),
                inset -5px -5px 5px rgba(255,255,255,0.2),
                inset 5px 5px 5px rgba(0,0,0,0.1);
                transition:1s ease-in;
                **/
                box-shadow:-15px -10px 15px grey,
                10px 5px 5px rgba(0,0,0,0.1),
                inset -5px -5px 5px rgba(255,255,255,0.2),
                inset 5px 5px 5px rgba(0,0,0,0.1);
                transition:1s ease-in;
        }
        #retrievebtn:hover{
            cursor: pointer;
            border-radius:15px;
            box-shadow:-15px -15px 15px rgba(255,255,255,0.2),
            15px 15px 15px rgba(0,0,0,0.1);
            border:2px solid #228b22;
        }
        #result{
            min-height:50vh;
            flex-basis:80%;
            width:80%;
            display:flex;
            flex-direction:column;
            color:#fff;
        }
        table{

            width:100%;
            border-collapse:collapse;
            text-align:center;

        }
        table tr:first-child{
            text-transform:uppercase;
        }
       
        tr:nth-child(1){
            background:#000;

        }

        tr,td{
            border:1px solid green;
        }
        table tr td:last-child{
            width:20%;
            

        }
        td{
            padding:5px;

        }
       
        table tr:hover{
            font-size:14px;
            cursor:pointer;
            background:grey;
            color:#000;
            font-weight:700;
        }
        a{
            text-decoration: none;
        }
        #exit{
            margin:5px;
        }
        #total{
            display:fixed;
            color:#fff;
            font-size:20px;
            font-weight:700;
            text-transform:uppercase;
            margin-bottom:5px;
        }
        @media only screen and (max-width:600px){
            table tr td:last-child{
                width:20%;
            }
        }
       
    </style>
</head>
<body>
    <button id="retrievebtn">
       Future Physicians | MBBS 2k26 class 
    </button>
     <p id='total'></p>
     
    <div id="result">
    </div>
    <a id="exit" href="home.php" class="btn btn-danger btn-2x"> Ready to Exit Future Doc ?</a>
   

    <script>
        $("#exit").hide();
        $('#total').hide();
        document.getElementById("retrievebtn").addEventListener("click",function(){
            var xhr=new XMLHttpRequest();
            xhr.open("GET","retrieve_data.php",true);
            xhr.setRequestHeader('Content-Type','application/json');
            xhr.onreadystatechange=function(){
                if(xhr.readyState===4 && xhr.status===200){
                    var responseData=JSON.parse(xhr.responseText);

                    //To arrange in order by date
                   
                   

                

                    responseData.data.sort(function(a,b){
                        return new Date(b.last_updated) - new Date(a.last_updated);
                    })
                    

                    displayData(responseData.data.reverse(),responseData.count);
                 //  displayData(responseData.data);
                   // console.log("The states are ready");
                }
            };
            xhr.send();
            console.log("The requests have been sent and received");
            $("#retrievebtn").hide();
            $('#total').show();
            $('#exit').show();
           
           
           
        })

        function displayData(data,count){
            var totalCount=document.getElementById('total');
            totalCount.textContent='Sum Total : '+count;
            
            var resultDiv=document.getElementById("result");
            resultDiv.innerHTML="";

            //Create a table to display the data
            var table=document.createElement("table");
            var heads=table.insertRow();

                //heads.insertCell().innerHTML="Unique ID";
                heads.insertCell().innerHTML="Full Names ";
                heads.insertCell().innerHTML="Birth Month/Day";
                heads.insertCell().innerHTML="State of Origin";
                heads.insertCell().innerHTML="Nationality";
                heads.insertCell().innerHTML="Hobbies";
                heads.insertCell().innerHTML="Cellular Contact";
                heads.insertCell().innerHTML="Gender";
                heads.insertCell().innerHTML="Nickname or P.K.A."
                heads.insertCell().innerHTML="Why Medicine and UI?";
              //  heads.insertCell().innerHTML="Email";

            //Iterate over each object in the data
            for(var i=0;i<data.length;i++){
                

                var row=table.insertRow();
              //  var idCell=row.insertCell();
                var nameCell=row.insertCell();
                var birthCell=row.insertCell();
                var stateCell=row.insertCell();
                var nationCell=row.insertCell();
                var hobbiesCell=row.insertCell();
                var contactCell=row.insertCell();
                var genderCell=row.insertCell();
                var nicknameCell=row.insertCell();
                var reasonCell=row.insertCell();
              //  var emailCell=row.insertCell();
                

                //idCell.innerHTML=data[i].id;
                nameCell.innerHTML=data[i].name || 'NIL';
                birthCell.innerHTML=data[i].birth || 'NIL';
                stateCell.innerHTML=data[i].state || 'NIL';
                nationCell.innerHTML=data[i].nation ||'NIL';
                hobbiesCell.innerHTML=data[i].hobbies ||'NIL';
                contactCell.innerHTML=data[i].contact|| 'NIL';
                reasonCell.innerHTML=data[i].reason || 'NIL';
                genderCell.innerHTML=data[i].gender || 'NIL';
                nicknameCell.innerHTML=data[i].nickname || 'NIL';
              //  emailCell.innerHTML=data[i].email;
                
             

            }
            //Append the table to the div 
            resultDiv.appendChild(table);
           
           
        }
       
        
        
        </script>
    
</body>
</html>