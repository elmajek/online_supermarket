<!DOCTYPE html>
<html>
   <head>
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
      <link href="{{asset('home/css/project.css')}}" rel="stylesheet" />
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.header')
         <!-- end header section -->
        
      
      <div class="col-sm-6 col-md-4 col-lg-4" style="margin:auto; width:50%; padding: 30px">
                  <div class="box">
                  
                     <div class="img-box" style="padding: 30px">
                        <img width="200" height="200" src="/product/{{$product->image}}" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           {{$product->title}}
                        </h5>
                        @if($product->discount_price!=null && $product->discount_price>0)
                        <h6 style="color:brown">
                        Discount
                        <br>
                        {{$product->discount_price}} EGP
                        </h6>
                        <h6 style="text-decoration:line-through; color:blue" >
                        Price
                        <br>
                        {{$product->price}} EGP
                        </h6>
                        @else
                        <h6 style="color:blue">
                        price
                        <br>
                        {{$product->price}} EGP
                        </h6>
                        @endif
                        <h6>Product Catagory : {{$product->catagory}}</h6>
                        <h6>Product Details : {{$product->description}}</h6>
                        <h6>Avaliable Quantity : {{$product->quantity}}</h6>
                        <form action="{{url('add_cart',$product->id)}}" method="Post">
                           @csrf
                           <div class="row">
                              <div class="col-md-4"><input type="number" name="quantity" value="1" min="1" style="width: 100px"></div>
                              <div class="col-md-4" ><input type="submit" value="Add To Cart"></div>
                           
                           
                           </div>
                        
                         </form>
                     </div>
                  </div>
               </div>


 
                <!-- Comment and Reply system Starts here -->
                <div style="text-align: center; padding-bottom:30px;">
         <h1 style="font-size:30px; text-align:center; padding-top:20px; padding-bottom:20px;">Comments</h1>
         <form action="{{url('add_comment')}}" method="POST">
            @csrf
            <textarea  style="height:150px; width:600px;" placeholder="Comment something here" name="comment"></textarea>
            <br>
            <input  style="background: rebeccapurple ;" type="submit" href="" class="btn btn-primary" value="Comment">
         </form>
      </div>
      <div style="padding-left: 20%;">
         <h1 style="font-size:20px; padding-bottom:20px;">All Comments</h1>
         @foreach($comment as $comment)
         <div>
            <p>{{$comment->name}}</p>
            <p>{{$comment->comment}}</p>
            <a href="javascript::void(0);" onclick="reply(this)" data-Commentid="{{$comment->id}}">Reply</a>
            
         @foreach($reply as $rep)
         @if($rep->comment_id==$comment->id)
         <div style="padding-left:3%; padding-bottom: 10px;  padding-bottom: 10px;">
         <p>{{$rep->name}}</p>
         <p>{{$rep->reply}}</p>
         <a href="javascript::void(0);" onclick="reply(this)" data-Commentid="{{$comment->id}}">Reply</a>

         </div>
         @endif
         @endforeach
         </div>

        @endforeach
         <div style="display:none;" class="replyDiv">
         <form action="{{url('add_reply')}}" method="POST">
            @csrf
         <input type="text" name="commentId" id="commentId" hidden="" >
            <textarea  style="height:100px; width:500px;" placeholder="Write Something here" name="reply"></textarea>
            <br>
          <button type="submit" style="background: rebeccapurple ; " class="btn btn-primary">Reply</button>
            <a href="javascript::void(0);" class="btn" onclick="reply_close(this)">Close</a>
</form>
         </div>
      </div>
      </div>
      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2023 All Rights Reserved By <a href="https://html.design/">Html & CSS</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">El_majeko</a>
         
         </p>
      </div>
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