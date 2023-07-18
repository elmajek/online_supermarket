<header class="header_section">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" href="{{url('/')}}"><img width="250" src="/images/logo.png" alt="#" /></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="nav-item active">
                           <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                        </li>
                     
                        <li class="nav-item">
                        <a class="nav-link" href="{{url('products')}}">Products</a>
                        </li>
                      
                        <li class="nav-item">
                           <a class="nav-link" href="#">Contact</a>
                        </li>
                       
                        @if (Route::has('login'))
                        @auth
                        <li class="nav-item" >
                           <a class="nav-link"  style="background-color: skyblue;" href="{{url('show_cart')}}">Cart [ <span style="color: red;">{{App\Models\cart::where('user_id','=',Auth::user()->id)->count()}}</span> ]</a>
                        </li>
                        @else
                        <li class="nav-item">
                           <a class="nav-link"  style="background-color: skyblue;" href="{{url('show_cart')}}">Cart [ 0 ]</a>
                        </li>
                       
                        @endauth
                        @endif

                        @if (Route::has('login'))
                        @auth
                        <li class="nav-item" style="padding-left: 5px;">
                           <a class="nav-link"  style="background-color: orange;" href="{{url('show_order')}}">  Order [ <span style="color: red;">{{App\Models\order::where('user_id','=',Auth::user()->id)->count()}}</span> ]</a>
                        </li>
                        @else
                        <li class="nav-item" style="padding-left: 5px;">
                           <a class="nav-link"  style="background-color: orange;" href="{{url('show_order')}}">  Order [ 0 ]</a>
                        </li>
                       
                        @endauth
                        @endif
                        <form class="form-inline">
                           <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                           <i class="fa fa-search" aria-hidden="true"></i>
                           </button>
                        </form>
                        @if (Route::has('login'))
                        @auth
                        <div class="dropdown">
                           <button class="dropdown-toggle bar" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              
                           </button>
                           <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <li class="nav-item">
                                 <a class="drop" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" id="logincss" href="{{ route('logout') }}">Logout</a>

                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                 </form>
                              </li>
                           </div>
                        </div>
                        @else
                        <div class="dropdown">
                           <button class="dropdown-toggle bar" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              
                           </button>
                           <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <li class="nav-item">
                                 <a class="drop" id="logincss" href="{{ route('login') }}">Login</a>
                              </li>
                              <li class="nav-item">
                                 <a  class="drop" href="{{ route('register') }}">Register</a>
                              </li>
                           </div>
                        </div>
                        @endauth
                        @endif
                     </ul>
                  </div>
               </nav>
            </div>
         </header>