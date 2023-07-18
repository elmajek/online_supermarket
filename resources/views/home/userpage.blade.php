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
      
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <style type="text/css">
  @import url('//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');

a, a:hover {
	text-decoration: none;
}

.socialbtns, .socialbtns ul, .socialbtns li {
  margin: 0;
  padding: 5px;
}

.socialbtns li {
    list-style: none outside none;
    display: inline-block;
}

.socialbtns .fa {
	width: 40px;
    height: 28px;
	color: #000;
	background-color: #FFF;
	border: 1px solid #000;
	padding-top: 12px;
	border-radius: 22px;
	-moz-border-radius: 22px;
	-webkit-border-radius: 22px;
	-o-border-radius: 22px;
}

.socialbtns .fa:hover {
	color: #ffffff;
	background-color: #000;
	border: 1px solid #000;
}


   </style>
   
   </head>
   <body>
   @include('sweetalert::alert')
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
         @include('home.slider')
         <!-- end slider section -->
      </div>
      <!-- why section -->
      @include('home.why')
      <!-- end why section -->
      <!-- arrival section -->
      @include('home.arrival')
      <!-- end arrival section -->
      
      <!-- product section -->
      @include('home.product')
      <!-- end product section -->
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


      <!-- subscribe section -->
      @include('home.subscribe')
      <!-- end subscribe section -->
      <!-- client section -->
      @include('home.client')
       <!-- end client section -->
      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2023 All Rights Reserved By <a href="https://html.design/">Html & CSS</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">El_majeko</a>
         
         </p>
      </div>
      <br/>
<div style="text-align:center;" class="socialbtns">
<ul>
<li><a href="https://www.facebook.com" class="fa fa-lg fa-facebook"></a></li>
<li><a href="https://twitter.com" class="fa fa-lg fa-twitter"></a></li>
<li><a href="#" class="fa fa-lg fa-google-plus"></a></li>
<li><a href="https://github.com" class="fa fa-lg fa-github"></a></li>
<li><a href="https://www.pinterest.com" class="fa fa-lg fa-pinterest"></a></li>
<li><a href="https://www.linkedin.com" class="fa fa-lg fa-linkedin"></a></li>
<li><a href="https://www.instagram.com" class="fa fa-lg fa-instagram"></a></li>
<li><a href="https://www.youtube.com" class="fa fa-lg fa-youtube"></a></li>
</ul>
</div>

      <script type="text/javascript">
        
         function reply(caller){
            document.getElementById('commentId').value=$(caller).attr('data-Commentid');
            $('.replyDiv').insertAfter($(caller));
            $('.replyDiv').show();

         }
         function  reply_close(caller){
            
            $('.replyDiv').hide();

         }


      </script>
      <!-- Scroll -->
       <script>
        document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
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