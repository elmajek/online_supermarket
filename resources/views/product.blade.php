<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="z818Dh5DL9q6uSQQoeUMTMEG7gFZ22uhpLYIHhpb">

    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="robots" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
	<meta property="og:title" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
	<meta property="og:description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
	<meta property="og:image" content="https:/fillow.dexignlab.com/xhtml/social-image.png">
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title>Admin Dashboard</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
	<link href="vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
	<link href="vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
	<link rel="stylesheet" href="vendor/nouislider/nouislider.min.css">
	
	<!-- Style css -->
    <link href="css/style.css" rel="stylesheet">
	
	<!-- PAGE TITLE HERE -->
	<title>Admin Dashboard</title>
	
	<style type="text/css">
        .div_center
        {
            text-align: center;
            padding-top: 40;
        }
        .font_size
        {
            font-size: 40px;
            padding-bottom: 40px;
        }
        .text_color
        {
            font-size:15px;
            border: 2px solid red;
            border-radius: 4px;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            color: black;
        }
        label
        {
            display: inline-block;
            width: 200px;
            font-size: 15px;
            font-weight: bold;
            padding: 3px;
        }
     

    </style>
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
  
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
		<div class="nav-header">
            <a href="{{url('redirect')}}" class="brand-logo">
				<svg class="logo-abbr" width="55" height="55" viewbox="0 0 55 55" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" clip-rule="evenodd" d="M27.5 0C12.3122 0 0 12.3122 0 27.5C0 42.6878 12.3122 55 27.5 55C42.6878 55 55 42.6878 55 27.5C55 12.3122 42.6878 0 27.5 0ZM28.0092 46H19L19.0001 34.9784L19 27.5803V24.4779C19 14.3752 24.0922 10 35.3733 10V17.5571C29.8894 17.5571 28.0092 19.4663 28.0092 24.4779V27.5803H36V34.9784H28.0092V46Z" fill="url(#paint0_linear)"></path>
					<defs>
					</defs>
				</svg>
				<div class="brand-title">
					<h2 class="">Star.</h2>
					<span class="brand-sub-title">@MoahmedSamir</span>
				</div>
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
  
 
        <div class="main-panel">
        <div class="content-wrapper">
            <div class="div_center">
                <h1 class="font_size">Add product</h1>
                <form action="{{url('/add_product')}}" method="POST"  enctype='multipart/form-data'>
                    @csrf
                <div class="div_design">
                    
                <label>Product Title :</label>
                <input  class="text_color" type="text" name="title" placeholder="write a title" required="">
               </div>
 
               <div class="div_design">
                <label>Product Description :</label>
                <input  class="text_color" type="text" name="description" placeholder="write a Description" required="">
               </div>
               <div class="div_design">
                <label>Product Price :</label>
                <input  class="text_color" type="text" name="price" placeholder="write a Price" required="">
               </div>
               <div class="div_design">
               <label>Discount Price :</label>
                <input  class="text_color" type="text" name="discount" placeholder="write a Discount Price" >
               </div>
               <div class="div_design">
                <label>Product Quantity :</label>
                <input  class="text_color" type="text" name="quantity" placeholder="write a Quantity" required="">
               </div>

               <div class="div_design">
                <label>Product Catagory :</label>
                <select class="text_color" name="catagory" required="">
                    <option value="" selected="">Add a Catagory Here</option>
                    @foreach($catagory as $catagory)
                    <option value="{{$catagory->catagory_name}}">{{$catagory->catagory_name}}</option>
                    @endforeach
                </select>
               </div>
               <div class="div_design">
                <label>Product Image Here :</label>
               <input type="file" name="image" required="">
               </div>
               <div class="div_design">
               <input type="submit" value="Add product" class="btn btn-primary">
               </div>
                </form>
            </div>
        </div>
	</div>
   
    
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
	<script src="vendor/chart.js/Chart.bundle.min.js"></script>
	<script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
	
	<!-- Apex Chart -->
	<script src="vendor/apexchart/apexchart.js"></script>
	
	<script src="vendor/chart.js/Chart.bundle.min.js"></script>
	
	<!-- Chart piety plugin files -->
    <script src="vendor/peity/jquery.peity.min.js"></script>
	<!-- Dashboard 1 -->
	<script src="js/dashboard/dashboard-1.js"></script>
	
	<script src="vendor/owl-carousel/owl.carousel.js"></script>
	
    <script src="js/custom.min.js"></script>
	<script src="js/dlabnav-init.js"></script>
	<script src="js/demo.js"></script>
    <script src="js/styleSwitcher.js"></script>
	<script>
		function cardsCenter()
		{
			
			/*  testimonial one function by = owl.carousel.js */
			
	
			
			jQuery('.card-slider').owlCarousel({
				loop:true,
				margin:0,
				nav:true,
				//center:true,
				slideSpeed: 3000,
				paginationSpeed: 3000,
				dots: true,
				navText: ['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>'],
				responsive:{
					0:{
						items:1
					},
					576:{
						items:1
					},	
					800:{
						items:1
					},			
					991:{
						items:1
					},
					1200:{
						items:1
					},
					1600:{
						items:1
					}
				}
			})
		}
		
		jQuery(window).on('load',function(){
			setTimeout(function(){
				cardsCenter();
			}, 1000); 
		});
		
	</script>

</body>
</html>

</body>
</html>
