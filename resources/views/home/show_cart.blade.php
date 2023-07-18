<!DOCTYPE html>
<html>
   <head>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <!-- Basic -->
      <!-- <base href="/public" -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion</title>
      <link rel="stylesheet" href="home/css/mo.css">
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />
      <style type="text/css">
         .center{
            margin: auto;
            width: 70%;
            text-align: center;
            padding: 30px;
         }
         table,th,td{
            border: 1px solid rebeccapurple;
         }
         .th_deg{
            font-size: 20px;
            padding: 5px;
            background: orangered;
         }
         .total_deg{
            font-size: 20px;
            padding: 40px;
            
         }
         .alert {
            font-size: 25px;
            text-align: center;
            padding: 20px;
            background-color: #f44336; /* Red */
            color: white;
  margin-bottom: 15px;
}
.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
      </style>
   </head>
   <body>
   @include('sweetalert::alert')
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.header')
         <!-- end header section -->
         @if(session()->has('message'))
          <div class="alert alert-success">
          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            {{session()->get('message')}}

          </div>
          @endif
      
      <div class="center"> 

      <table>
         <tr>
            <th class="th_deg">product title</th>
            <th class="th_deg">product quantity</th>
            <th class="th_deg">Price</th>
            <th class="th_deg">Image</th>
            <th class="th_deg">Action</th>
         </tr>
         <?php $totalprice=0;  ?>
         @foreach($cart as $cart)
         <tr>
            <td>{{$cart->product_title}}</td>
            <td>{{$cart->quantity}}</td>
            <td>{{$cart->price}} EGP</td>
            <td><img width="150" height="150" src="/product/{{$cart->image}}" alt=""></td>
            <td> <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('/remove_cart',$cart->id)}}">Remove Product</a></td>
        
         </tr>
         <?php $totalprice=$totalprice + $cart->price;  ?>
         @endforeach

      </table>
      <div>
         <h2>Total price :{{$totalprice}} EGP</h2>
      </div>
      <div>
         <h1 style="font-size: 25px; padding-bottom: 15px;">Procedd to Order</h1>
         <a href="{{url('cach_order')}}" class="btn btn-danger">Cash on Delivary</a>
         <a href="{{url('stripe',$totalprice)}}" class="btn btn-danger">Pay Using Card</a>
      </div>
      </div>
      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2023 All Rights Reserved By <a href="https://html.design/">Design Html & CSS</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">Mohamed Samir</a>
         
         </p>
      </div>
      <script>
      function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');  
        console.log(urlToRedirect); 
        swal({
            title: "Are you sure to cancel this product",
            text: "You will not be able to revert this!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willCancel) => {
            if (willCancel) {
                  window.location.href = urlToRedirect;
            } 
              });  }
</script>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>