<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <div>
                  <form action="{{url('search_product')}}" method="GET">
                     <input style="width: 500px;" type="text" name="search" placeholder="Search for Something">
                     <input type="submit" value="Search" >
                  </form>
               </div>
            </div>
            @if(session()->has('message'))
          <div class="alert alert-success">
          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            {{session()->get('message')}}

          </div>
          @endif
          <div class="container my-5">
            <hr>
             <h3 class="text-center my-5" >Category</h3>
            <div class="row">
               
                  
                  @foreach($catagory as $catagorys)
                  <a href="{{ url('category', ['category' => $catagorys->catagory_name]) }}" class="ml-3">{{ $catagorys->catagory_name }}</a>
                  @endforeach
           
            </div>
          </div>
			
            <div class="row">
               @foreach($product as $products)
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="{{url('product_detials',$products->id)}}" class="option1">
                           Product Detials
                           </a>
                         <form action="{{url('add_cart',$products->id)}}" method="Post">
                           @csrf
                           <div class="row">
                              <div class="col-md-4"><input type="number" name="quantity" value="1" min="1" style="width: 100px"></div>
                              <div class="col-md-4" ><input type="submit" value="Add To Cart"></div>
                           
                           
                           </div>
                        
                         </form>
                        </div>
                     </div>
                     <div class="img-box">
                        <!-- <img src="product/{{$products->image}}" alt=""> -->
                        <img src="{{ asset('product/' . $products->image) }}" alt="Product Image">

                        
                     </div>
                     <div class="detail-box">
                        <h5>
                           {{$products->title}}
                        </h5>
                        @if($products->discount_price!=null && $products->discount_price>0)
                        <h6 style="color:brown">
                        Discount
                        <br>
                        {{$products->discount_price}} EGP
                        </h6>
                        <h6 style="text-decoration: line-through; padding-left: 30px;  color:blue" >
                        Price
                        <br>
                        {{$products->price}} EGP
                        </h6>
                        @else
                        <h6 style="padding-left: 50px; color:blue">
                        price
                        <br> 
                        {{$products->price}} EGP
                        </h6>
                        @endif
                     </div>
                  </div>
               </div>
              
          @endforeach
          <br>
          <span  style="padding-top: 40px;">
         {!!$product->withQueryString()->links('pagination::bootstrap-5')!!}
          </span>
         </div>
      </section>