<div class="dlabnav">
            <div class="dlabnav-scroll">
				<ul class="metismenu" id="menu">
                
					
                    <li>
                        <ul aria-expanded="false">
                            
                            <li>
                                <ul aria-expanded="false">
                                   
                                </ul>
                            </li>
                            <li></li>
							<li>
                                <ul aria-expanded="false">
                                   
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul aria-expanded="false">
                           
                        </ul>
                    </li>
                    <li>
                        <ul aria-expanded="false">
                          
                        </ul>
                    </li>
                    <li><a href="{{url('redirect')}}" class="" aria-expanded="false">
							<i class="fas fa-home"></i>
							<span class="nav-text">Dashborad</span>
						</a>
					</li>
                    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
							<i class="fas fa-heart"></i>
							<span class="nav-text">Products</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{{url('view_product')}}">Add products</a></li>
                            <li>
                                <a href="{{url('show_product')}}">Show products</a>
                            
                            </li>
                         
                        </ul>
                    </li>
                   
                    <li><a href="{{url('view_catagory')}}" class="" aria-expanded="false">
							<i class="fas fa-user-check"></i>
							<span class="nav-text"> Catagory</span>
						</a>
					</li>
                  
                    <li><a href="{{url('order')}}" class="" aria-expanded="false">
							<i class="fas fa-file-alt"></i>
							<span class="nav-text">Order</span>
						</a>
					</li>
                    <!-- <li><a href="widget-basic.html" class="" aria-expanded="false">
							<i class="fas fa-user-check"></i>
							<span class="nav-text">Widget</span>
						</a>
					</li> -->
                    <li>
                        <ul aria-expanded="false">
                            
                        </ul>
                    </li>
                    <li>
                        <ul>
                        
                        </ul>
                    </li>
                    <li>
                        <ul >
                           
                                <ul >
                                  
                                </ul>
                            </li>
                          
                        </ul>
                    </li>
                </ul>
            </div>
				
            <div class="row">
                    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">{{$total_product}}</h3>
                         
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success ">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Total Products</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">{{$total_order}}</h3>
                          
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Total Order</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">{{$total_user}}</h3>
                         
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-danger">
                          <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Total Customers</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
				         	<h3 class="mb-0">{{$total_revenue}} EGP</h3>
                          
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success ">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Total Revenue</h6>
                  </div>
                </div>
              </div>

			  <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">{{$total_delivered}}</h3>
                         
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success ">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Order Delivery</h6>
                  </div>
                </div>
              </div>

			    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">{{$total_processing}}</h3>
                         
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success ">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Order processing</h6>
                  </div>
                </div>
              </div>
            </div>
			</div> 
            
            </div>
			</div> 
       