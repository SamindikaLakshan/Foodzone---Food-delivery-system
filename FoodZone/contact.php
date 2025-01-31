<?php include('head/header.php'); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="contatc.css">
    <title>Contact Us</title>
    <style>
        body{
            background-color: #ddd;
        }
        main {
            height: 90vh;
            border: 1px solid rgba(0, 0, 0, 0);
            max-width: 800px;
            display: inline-block;
            margin-top: 20px;
            position: relative;
            left: 40%;
            transform: translateX(-50%);
            padding: 0 0 20px 0;
        }
        main p{
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 2vw;
            font-weight: 200;
            margin-bottom: 50px;
        }
        form{
            margin-top: -20px;
        }
        form input[type="text"], form input[type="email"], form textarea {
            display: block;
            height: 45px;
            width: 430px;
            border: none;
            outline: none;
            border-radius: 25px;
            background-color: rgb(255, 255, 255);
            box-shadow: 0 4px 2px 0 rgba(0, 0, 0, 0.082), 0 6px 2px 0 rgba(0, 0, 0, 0.014);
            padding-left: 20px;
        }
        form textarea {
            height: 130px;
            padding-top: 10px;
        }
        ::placeholder{
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            
            font-size: 13px;
            color: #1a5a74;
        }
        button{
            position: relative;
            left: 50%;
            transform: translateX(-50%);
            padding: 15px 30px;
            border-radius: 25px;
            font-size: 15px;
            background-image: linear-gradient(to right, #aa076b, #61045f);
            color: white;
            border: none;
            cursor: pointer;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-weight: 600;
        }   
        button:hover{
            background-image: linear-gradient(to right, #61045f, #aa076b);
        } 
        .img{
            border: 1px solid rgba(255, 0, 0, 0);
            width: 300px;
            position: absolute;
            top: 80px;
            left: 130%;
        }
        .title-contact{
            width: fit-content;
            position: relative;
            top: -220px;
            left: 140%;
            
        }
    </style>
</head>
<body>
   
    <main>
		<p style="text-align: center;">SEND US A MASSAGE</p>
		<span style="text-align: center; color: red;" id="demo"></span>
		<form action="#" >
			<input type="text" id="name" name="name" placeholder="full Name" required><br>

			<input type="email" id="email" name="email" placeholder="Email" required><br>

			<input type="text" id="phone" name="subject" placeholder="Phone" required><br>

			<textarea id="message" name="message" placeholder="Your Message" required ></textarea><br>

			<button type="submit" onclick="sub()">SEND</button>
		</form>

        <div class="img">
            <img style="width:100%" src="images/contact.png" alt="$">
        </div>
        <div class="title-contact">
            <h2 style="font-weight: 200;"> <span style="font-size: 4vw; font-weight: 700; text-shadow: 7px 5px rgb(201, 199, 199);">Contact Us</span>  <br>Let's Start a Conversation</h2>
        </div>
	</main>
    
    <?php include('head/footer.php'); ?>

    <script>
		function myFunction() {
		  var x = document.getElementById("myTopnav");
		  if (x.className === "topnav") {
			x.className += " responsive";
		  } else {
			x.className = "topnav";
		  }
		}

		window.onscroll = function() {myFunction2()};
		var navbar = document.getElementById("myTopnav");
		var sticky = navbar.offsetTop;
		function myFunction2() {
		if (window.pageYOffset >= sticky) {
			navbar.classList.add("sticky")
		} else {
			navbar.classList.remove("sticky");
		}
		}

        function sub(){
            var name = document.getElementById("name").value;
            var phone = document.getElementById("phone").value
            var email = document.getElementById("email").value
            var message = document.getElementById("message").value
            if(name=! "" && phone != "" && email != "" && message != ""){
                alert("Massage Submited.");
            }
            
        }
		
	</script>
</body>
</html>