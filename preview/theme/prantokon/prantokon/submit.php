<html lang="zxx">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Conference</title>


<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" media="all" />

<link rel="stylesheet" type="text/css" href="assets/css/slicknav.min.css" media="all" />

<link rel="stylesheet" type="text/css" href="assets/css/icofont.css" media="all" />

<link rel="stylesheet" type="text/css" href="assets/css/slick.css">
<link rel="stylesheet" href="assets/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.css">

<link rel="stylesheet" type="text/css" href="assets/css/magnific-popup.css">

<link rel="stylesheet" type="text/css" href="assets/css/switcher-style.css">

<link rel="stylesheet" type="text/css" href="assets/css/animate.min.css">

<link rel="stylesheet" type="text/css" href="assets/css/style.css" media="all" />

<link rel="stylesheet" type="text/css" href="assets/css/responsive.css" media="all" />

<link rel="icon" type="image/png" href="assets/img/favcion.png" />
<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
</head>
<section class="blog-area ptb-90" id="call">
<div class="container"><div class="row">
<div class="col-lg-12">
<div class="sec-title">
<h2>Submit Your Abstract<span class="sec-title-border"><span></span><span></span><span></span></span></h2><br>
<b><h4>Deadline July 15th, 2019 .</h4></b>
</div>
<br>
<b><h3>Deadline July 15th, 2019 </h3></b>
<br>
</div>
</div>
<div class="row">
<div class="col-lg-6 col-md-4">
<div class="contact-form">
<p class="form-message"></p>    
<form id="contact-form" action="#" method="POST">
<input type="text" name="title" placeholder="Title">
<input type="text" name="authors" placeholder="Authors">
<input type="text" name="email" placeholder="Email      Exemple: contact@contact.com">

</div>
</div>
<div class="col-lg-6 col-md-4">
<div class="contact-form">

<p class="form-message"></p>

<input type="text" name="affiliation" placeholder="Affiliation">
<p>Abstract</p>
<textarea name="abstract" placeholder="maximum 300 words!" cols="30" rows="5"></textarea>


<button type="submit" name="submit">SEND</button>
</form>
<?php

			if(isset($_POST['submit'])){
						$host = "ibcworkspp2019.mysql.db";
						$user = "ibcworkspp2019";
						$password = "IBCworkspp2019";
						$dbname = "ibcworkspp2019";

				// Create connection
					$con = mysqli_connect($host, $user, $password,$dbname);
				
					
					$Title = $_POST['title'];   
					$Authors = $_POST['authors'];   
					$Email = $_POST['email'];   					
					$Affiliation = $_POST['affiliation'];
					$Abstract=$_POST['abstract'];
					$words = str_word_count($Abstract);
					if($words > 300){
						exit("You have entered more than 300 words");
					}
					//$sql = "INSERT INTO invite (nom, prenom, email) VALUES ('Peter', 'Parker', 'peterparker@mail.com')";
					//echo ' \n Salut '. $Nom .' '. $Affiliation.' '.$PreNom .' '.$Email .' '.$Pays .' '. $Grade .' '. $Speciality.' <br/>Bienvenue sur mon site !';
					if (!mysqli_select_db($con,'ibcworkspp2019'))     
						die("Unable to select database: " . mysql_error()); 
					$sql_stmt = "INSERT INTO `submission` (`title`,`authors`,`email`,`affiliation`,`abstract`)"; 
					$sql_stmt .= " VALUES('$Title','$Authors','$Email', '$Affiliation','$Abstract')";   
					$result = mysqli_query($con,$sql_stmt);
					//echo "Entered data successfully\n";
					if ($result){
					echo '<script language="javascript">';
					echo 'alert("Entered data successfully")';
					echo '</script>';
					}
					if (!$result){
						die("Database access failed: " . mysqli_error()); 
					}
					 $to      = 'internationa.ibc.symposium@gmail.com';
					 $subject = 'New Submission';
					 $message1 = $Authors ."send new Abstract :\n
					 Title : ".$Title ."\n
					 Affiliation : ".$Affiliation." \n
					 Abstract : .".$Abstract;
					 $headers = "Content-Type: text/html; charset=\"iso-8859-1\"";
					 $headers .= "From: ".$Email . "\r\n" .
					 'Reply-To: internationa.ibc.symposium@gmail.com'. "\r\n" .
					 'X-Mailer: PHP/' . phpversion();
					 $message = '<html><body>';
						
						
						$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
						$message .= "<tr style='background: #eee;'><td><strong>Title:</strong> </td><td>" . strip_tags($Title) . "</td></tr>";
						$message .= "<tr style='background: #eee;'><td><strong>Authors:</strong> </td><td>" . strip_tags($Authors) . "</td></tr>";
						$message .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($Email) . "</td></tr>";
						$message .= "<tr><td><strong>Affiliation:</strong> </td><td>" . strip_tags($Affiliation) . "</td></tr>";
						//$message .= "<tr><td><strong>Urgency:</strong> </td><td>" . strip_tags($_POST['urgency']) . "</td></tr>";
						//$message .= "<tr><td><strong>URL To Change (main):</strong> </td><td>" . $_POST['URL-main'] . "</td></tr>";
						//$addURLS = $_POST['addURLS'];
						$curText = htmlentities($Abstract);           
						if (($curText) != '') {
							$message .= "<tr><td><strong>Abstract: </strong> </td><td>" . $curText . "</td></tr>";
						}
						
						$message .= "</table>";
						$message .= "</body></html>";
					 
						#print($message."\n");
						#print($headers."\n");
					 mail($to, $subject, $message, $headers);
					 
					 $toR      = $Email;
					 $subjectR = 'Submission Confirmation';
					 $headersR = "Content-Type: text/html; charset=\"iso-8859-1\"";
					 $headersR .= "From: internationa.ibc.symposium@gmail.com \r\n" ;
					//'Reply-To:internationa.ibc.symposium@gmail.com ' . "\r\n";
					 $messageR = '<html><body>';
						
						
						$messageR .= "Dear Dr,<br>

Thank you for having submitted an abstract for the <b>\"1st International Workshop on Inflammatory Breast Cancer\"</b>.<br><br>

You can submit additional abstracts. Please ensure that all details regarding your submissions are correct, the title has been recorded correctly and that all scientific symbols appear true to text.<br><br>

Your abstract will be reviewed by the Scientific Committee in the coming months and the outcome notification will be sent to the first author by the end of August. <br>
Please feel free to visit the congress website http://ibc-workshop.com/ for further information on the program, registration and accommodation services available to you.<br><br>

We are looking forward to welcoming you to Tunis in 25th-26thSeptember, 2019.<br><br>

Kind regards,<br>
The Inflammatory Breast Cancer International Consortium,<br>
1st International Workshop on IBC organizers<br>" ;
						
						
						$messageR .= "<img src=\"http://ibc-workshop.com/assets/img/screenshot/ibc.jpg \" />" ; 
						$messageR .= "<img src=\"http://ibc-workshop.com/assets/img/logo1.jpg \"/>";
						$messageR .= "</body></html>";
					 
						//print($message."\n");
						//print($headers
					 mail($toR, $subjectR, $messageR, $headersR);
					
				}
				
        ?>
</div>
</div>

</div>
</div>
</section>
</html>