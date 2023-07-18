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
            font-weight: bold;
            padding-bottom: 40px;
        }
        .table_dig{
            border: 2px solid rebeccapurple;
            width: 100%;
            margin: auto;
            text-align: center;
        }
        .th_deg{
            background: orangered;
            padding: 14px;
            font-size: 16px;
        }
     td{
        padding: 8px;
        font-size: 14px;
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
					<span class="brand-sub-title">@MohamedSamir</span>
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
            <h2 class="div_center">All Orders</h2>
            <div style="padding-left:520px; padding-bottom:30px;"> 
            <form action="{{url('search')}}" method="get" >
                @csrf
                <input style="padding: 10px; "type="text" name="search" placeholder="Search For Something">
                <input type="submit" value="Search" class="btn btn-primary">
            </form>
        </div>
           
            <table class="table_dig">
                <tr class="th_deg">
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>phone</th>
                    <th>Product title</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Payment Status</th>
                    <th>Delivery Status</th>
                    <th>Image</th>
                    <th>Delivery</th>
                    <th>Print pdf</th>
                    <th>Send Email</th>
                </tr>
                @forelse($order as $order)
                <tr>
                   
                    <td style="padding: 20">{{$order->name}}</td>
                    <td style="padding: 20">{{$order->email}}</td>
                    <td style="padding: 20">{{$order->address}}</td>
                    <td style="padding: 20">{{$order->phone}}</td>
                    <td style="padding: 20">{{$order->product_title}}</td>
                    <td style="padding: 20">{{$order->quantity}}</td>
                    <td style="padding: 20">{{$order->price}}</td>
                    <td style="padding: 20">{{$order->payment_status}}</td>
                    <td style="padding: 20">{{$order->delivery_status}}</td>
                    <td style="padding: 20"><img src="/product/{{$order->image}}"  height="130" width="130"></td>
                    <td>
                        @if($order->delivery_status=='processing')
                        <a href="{{url('delivered',$order->id)}}" class="btn btn-primary">Delivered</a>
                        @else
                        <p style="color: blue">delivered</p>
                        @endif
                    </td>
                    <td>
                        <a href="{{url('print_pdf',$order->id)}}" class="btn btn-secondary">Print Pdf</a>
                    </td>
                    <td>
                        <a href="{{url('send_email',$order->id)}}" class="btn btn-info">Email</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="18">
                    No Data Found
                    </td>
                </tr>
                @endforelse
            </table>
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
