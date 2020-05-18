<?php  
    session_start();  
      
    if(!$_SESSION['username'])  
    {  
      
        header("Location: /index.html");//redirect to login page to secure the welcome page without login access.  
    }  
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Hotels</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../styles/bootstrap4/bootstrap.min.css">
<link href="../plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="../styles/news.css">
<link rel="stylesheet" type="text/css" href="../styles/news_responsive.css">
<!-- Google font -->
<link href="https://fonts.googleapis.com/css?family=Alegreya:700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400" rel="stylesheet">
<!-- Bootstrap -->
<link type="text/css" rel="stylesheet" href="../styles/bootstrap.min.css" />
<!-- Custom stlylesheet -->
<link type="text/css" rel="stylesheet" href="../styles/style.css" />
<script>

function setValue(val) {
			alert(val);
			document.getElementById('id_hotel').value = val;	
			}
</script>
</head>
<body>

<div class="super_container">
	
	<!-- Header -->

	<header class="header">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="header_content d-flex flex-row align-items-center justify-content-start">
						<div class="header_content_inner d-flex flex-row align-items-end justify-content-start">
							<div class="logo"><a href="../index.html">HotelMania</a></div>
							<nav class="main_nav">
								<ul class="d-flex flex-row align-items-start justify-content-start">
									<li><a href="mainCustomer.php">Welcome</a></li>
									<li><a href="hotelsCustomer.php">Your booking</a></li>
									<li class="active"><a href="showCustomer.php">Hotels</a></li>
									<li><a href="../php/logout.php">Logout</a></li>
								</ul>
							</nav>
							<div class="header_phone ml-auto">Welcome <?php echo $_SESSION['username']; ?></div>

							<!-- Hamburger -->

							<div class="hamburger ml-auto">
								<i class="fa fa-bars" aria-hidden="true"></i>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="header_social d-flex flex-row align-items-center justify-content-start">
			<ul class="d-flex flex-row align-items-start justify-content-start">
				<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
			</ul>
		</div>
	</header>

	<!-- Menu -->

	<div class="menu">
		<div class="menu_header d-flex flex-row align-items-center justify-content-start">
			<div class="menu_logo"><a href="../index.html">HotelMania</a></div>
			<div class="menu_close_container ml-auto"><div class="menu_close"><div></div><div></div></div></div>
		</div>
		<div class="menu_content">
			<ul>
				<li><a href="inex.html">Home</a></li>
				<li><a href="about.html">About us</a></li>
				<li><a href="#">Services</a></li>
				<li><a href="news.html">News</a></li>
				<li><a href="contact.html">Contact</a></li>
			</ul>
		</div>
		<div class="menu_social">
			<div class="menu_phone ml-auto">Call us: 00-56 445 678 33</div>
			<ul class="d-flex flex-row align-items-start justify-content-start">
				<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
			</ul>
		</div>
	</div>
	
	<!-- Home -->

	<div class="home">
		<div class="background_image" style="background-image:url(../images/news.jpg)"></div>
	</div>

	

	<!-- News -->

	<div class="news">
		<div class="container">
			<div class="row">
					<h2>Hotels in Travello</h2>
					<hr>
					<table id="thesis" class="thesis" ></table>
					</div>
				</div>
			</div>


			 <!-- Modal -->
		  <div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog"></div>
			
			  <!-- Modal content-->
			<div class="modal-content">
				<div id="booking" class="section">
					<div class="section-center">
						<div class="container">
							<div class="row">
								<div class="booking-form">
									<form>
										<div class="row no-margin">
											<div class="col-md-3">
												<div class="form-header">
													<h2>Book Now</h2>
												</div>
											</div>
											<div class="col-md-7">
												<div class="row no-margin">
													<div class="col-md-4">
														<div class="form-group">
															<span class="form-label">Check In</span>
															<input class="form-control" type="date" id="date-in" required>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<span class="form-label">Check out</span>
															<input class="form-control" type="date" id="date-out" required>
														</div>
													</div>
													<input id='id_hotel' type="text" hidden>
													
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-btn">
													<button type='button' class='btn btn-info btn-lg' id="submit">Book</button>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			  </div>
			</div>
		  

	<!-- Footer -->

	<footer class="footer">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="../images/footer_1.jpg" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter">
						<div class="newsletter_title_container text-center">
							<div class="newsletter_title">Subscribe to our newsletter to get the latest trends & news</div>
							<div class="newsletter_subtitle">Join our database NOW!</div>
						</div>
						<div class="newsletter_form_container">
						</div>
					</div>
				</div>
			</div>
			<div class="row footer_contact_row">
				<div class="col-xl-10 offset-xl-1">
					<div class="row">

						<!-- Footer Contact Item -->
						<div class="col-xl-4 footer_contact_col">
							<div class="footer_contact_item d-flex flex-column align-items-center justify-content-start text-center">
								<div class="footer_contact_icon"><img src="../images/sign.svg" alt=""></div>
								<div class="footer_contact_title">give us a call</div>
								<div class="footer_contact_list">
									<ul>
										<li>Office Landline: +44 5567 32 664 567</li>
										<li>Mobile: +44 5567 89 3322 332</li>
									</ul>
								</div>
							</div>
						</div>

						<!-- Footer Contact Item -->
						<div class="col-xl-4 footer_contact_col">
							<div class="footer_contact_item d-flex flex-column align-items-center justify-content-start text-center">
								<div class="footer_contact_icon"><img src="../images/trekking.svg" alt=""></div>
								<div class="footer_contact_title">come & drop by</div>
								<div class="footer_contact_list">
									<ul style="max-width:190px">
										<li>4124 Barnes Street, Sanford, FL 32771</li>
									</ul>
								</div>
							</div>
						</div>

						<!-- Footer Contact Item -->
						<div class="col-xl-4 footer_contact_col">
							<div class="footer_contact_item d-flex flex-column align-items-center justify-content-start text-center">
								<div class="footer_contact_icon"><img src="../images/around.svg" alt=""></div>
								<div class="footer_contact_title">send us a message</div>
								<div class="footer_contact_list">
									<ul>
										<li>youremail@gmail.com</li>
										<li>Office@yourbusinessname.com</li>
									</ul>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
		<div class="col text-center">Copyright &copy; Travello</div>
	</footer>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
			$.ajax({
                type: 'GET',
                url: '../php/getRoomsRemain.php', 
                success: function(data) {
                var result = JSON.parse(data);
				console.log(result);
				var output =
                "<thead><tr><th>Name</th><th>Address</th><th>City</th><th>Number Rooms</th><th>State</th><th>Zip</th><th>Wifi</th><th>Heating Type</th><th>Coolling Type</th><th>Price</th><th>Rooms Remeine</th><th>Image</th><th>Booking</th></thead><tbody>";
                for (var i in result) {
                output +=
				"<tr><td>" +
                    result[i].name +
                    "</td><td>" +
                    result[i].address +
					"</td><td>" +
                    result[i].city +
					"</td><td>" +
                    result[i].room +
					"</td><td>" +
                    result[i].state +
					"</td><td>" +
                    result[i].zip +
					"</td><td>" +
                    result[i].wifi +
					"</td><td>" +
                    result[i].heating +
					"</td><td>" +
                    result[i].coolling +
					"</td><td>" +
                    result[i].price +
					"</td><td>" +
                    result[i].mainrooms +
					"</td><td><img src='"+
                    result[i].image +
					"' width='175' height='200' /></td><td><button type='button' class='btn btn-info btn-lg' data-toggle='modal' data-target='#myModal' onclick='setValue("+result[i].id+")'>Book</button></td></tr>";
                }
                output += "</tbody>";
				$("#thesis").html(output);

				}     
        			});
						//});
						

						
			$('#submit').on('click', function(){
				  var date = new Date($('#date-in').val());
				  day = date.getDate();
				  month = date.getMonth() + 1;
				  year = date.getFullYear();
				  dateIn = [day, month, year].join('-');
				  date = new Date($('#date-out').val());
				  day = date.getDate();
				  month = date.getMonth() + 1;
				  year = date.getFullYear();
				  dateLe = [day, month, year].join('-');
				  var id = document.getElementById('id_hotel').value;
					alert(id);
				   $.ajax({
							type: 'POST',
							url: '../php/reservation.php', 
							data: {id: id,dateIn: dateIn, dateLe: dateLe},
						})
						.done(function(data){
							
							var result = JSON.parse(data);
							alert(result);
							if(result.message == 'error'){
							alert(result.mess);
							}else{
								alert(result);
							window.location.href="./payCustomer.php?money="+result;
								
							}
						})
						.fail(function() {
 
						});
		
				  
						//var result = JSON.parse(data);
						

				});
		});
</script>
<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../styles/bootstrap4/popper.js"></script>
<script src="../styles/bootstrap4/bootstrap.min.js"></script>
<script src="../plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="../plugins/easing/easing.js"></script>
<script src="../plugins/parallax-js-master/parallax.min.js"></script>
<script src="../js/news.js"></script>
</body>
</html>