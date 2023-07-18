<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Catagory;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Session;
use Stripe;
use PDF;
use Notification;
use App\Notifications\SendEmailNotification;
use App\Models\Comment;
use App\Models\Reply;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    //function page user
    function page(){
      $product=Product::paginate(6);
      $comment=comment::orderby('id','desc')->get();
      $reply=reply::all();
        return view('home.userpage',compact('product','comment','reply'));
        }
    //function
    function index(){

    return view('index');
    }
    //fun admin
    public function redirect ( ) 
    {
         $usertype=Auth::user()->usertype;
         if ($usertype=='1'){
            $total_product=product::all()->count();
            $total_order=order::all()->count();
            $total_user=user::all()->count();
            $order=order::all();

            $total_revenue=0;
            foreach($order as $order)
            {
               $total_revenue=$total_revenue + $order->price;
            }
            $total_delivered=order::where('delivery_status','=','delivered')->get()->count();
            $total_processing=order::where('delivery_status','=','processing')->get()->count();
            return view('index',compact('total_product','total_order','total_user','total_revenue','total_delivered','total_processing'));

         }else{
            $product=Product::paginate(6);
             
            $comment=comment::orderby('id','desc')->get();
            $reply=reply::all();
            return view('home.userpage',compact('product','comment','reply'));
         }
          

}
// function  view_ catagory
     public function  view_catagory()
     {
         if(Auth::id()){
            $data=catagory::all();
            return view('catagory',compact('data'));

         }else{
            return redirect('login');
         }
       

     }
     // function  add_ catagory data
     public function  add_catagory(Request $request)
     {
       $data=new catagory;
       $data->catagory_name=$request->catagory;
       $data->save();
       return redirect()->back()->with('message','Catagory Added Successfully');
      


     } 
     // delete catagory
     public function delete_catagory($id){
        $data=catagory::find($id);
        $data->delete();
        return redirect()->back()->with('message','Catagory Deleted Successfully');


     }
     // view_product
     public function view_product(){
      $catagory=catagory::all();
        return view('product',compact('catagory'));
     }
     // add_product
     public function add_product(Request $request){
      $product=new product;

      $product->title=$request->title;

      $product->description=$request->description;

      $product->price=$request->price;

      $product->discount_price=$request->discount;

      $product->quantity=$request->quantity;

      $product->catagory=$request->catagory;

      $image=$request->image;
      $imagename=time().'.'.$image->getClientOriginalExtension();
      $request->image->move('product',$imagename);

      $product->image=$imagename;

      $product->save();

      return redirect()->back();

     }
     // fun show_product
     public function show_product(){
      $product=product::all();
      

      return view('show_product',["product" =>  $product]);
     }
     // fun page show_product--> delete_product
     public function delete_product($id){

      $product=product::find($id);
      $product->delete();
      return redirect()->back()->with('message','Product Deleted Successfully');
     }
     // fun page to work update
     public function update_product($id){
      $product=product::find($id);
      $catagory=catagory::all();
      return view('update_product',compact('product','catagory'));
     }
     // function update page user
     public function update_product_confirm(Request $request ,$id){
         if(Auth::id()){

            $product=product::find($id);
            $product->title=$request->title;
            $product->description=$request->description;
            $product->price=$request->price;
            $product->discount_price=$request->discount;
            $product->catagory=$request->catagory;
            $product->quantity=$request->quantity;
      
            $image=$request->image;
            if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product',$imagename);
      
            $product->image=$imagename;
            }
            $product->save();
      
            return redirect()->back()->with('message','Product Updated Successfully');
      
         }else{
            return redirect('login');
         }
    
      
     }
     // Adding detials product page user
     public function product_detials($id){
      $product=product::find($id);
      $comment=comment::orderby('id','desc')->get();
      $reply=reply::all();
      
      return view('home.product_detials',compact('product','comment','reply'));

     }
     // Adding cart work user
     public function add_cart(Request $request,$id){
      if(Auth::id()){
        $user=Auth::user();
        $user_id=$user->id;
        $product=product::find($id);
        $product_exist_id=cart::where('product_id','=',$id)->where('user_id','=', $user_id)->get('id')->first();
        if($product_exist_id){
         $cart=cart::find($product_exist_id)->first();
         $quantity=$cart->quantity;
         $cart->quantity=$quantity + $request->quantity;
         if($product->discount_price!=null){
            $cart->price=$product->discount_price * $cart->quantity;
   
           }else{
            $cart->price=$product->price * $cart->quantity;
           }
         $cart->save();
         Alert::success('Product Added Successfully','We have added product to cart');
         return redirect()->back()->with('message','Product Added Successfully');
         

        }else{
         $cart=new cart;
         $cart->name=$user->name;
         $cart->email=$user->email;
         $cart->phone=$user->phone;
         $cart->address=$user->address;
         $cart->user_id=$user->id;
         $cart->product_title=$product->title;
         if($product->discount_price!=null){
          $cart->price=$product->discount_price * $request->quantity;
 
         }else{
          $cart->price=$product->price * $request->quantity;
         }
        
         $cart->image=$product->image;
         $cart->product_id=$product->id;
 
         $cart->quantity=$request->quantity;
         $cart->save();
         return redirect()->back()->with('message','Product Added Successfully');
        }

       

      }
      else {
         return redirect('login');
      }
     }
     // function show_cart user
     public function show_cart(){
      if(Auth::id()){
         $id=Auth::user()->id; 
         $cart=cart::where('user_id','=',$id)->get();
         return view('home.show_cart',compact('cart'));
      }else{
         return redirect('login');
      }
     
     }
     // function remove_product_ask_cart user
     public function remove_cart($id){
      $cart=cart::find($id);
      $cart->delete();
      return redirect()->back();



     }
     // function work pay electony user
     public function cach_order(){
      $user=Auth::user();
      $userid=$user->id;
      $data=cart::where('user_id','=',$userid)->get();
      foreach($data as $data){
         $order=new order;
         $order->name=$data->name;
         $order->email=$data->email;
         $order->phone=$data->phone;
         $order->address=$data->address;
         $order->user_id=$data->user_id;
         $order->product_title=$data->product_title;
         $order->price=$data->price;
         $order->quantity=$data->quantity;
         $order->image=$data->image;
         $order->product_id=$data->product_id;
         $order->payment_status='cash on delivery';
         $order->delivery_status='processing';
         $order->save();
         $cart_id=$data->id;
         $cart=cart::find($cart_id);
         $cart->delete();

      }
      return redirect()->back()->with('message','We have Received your Order.We Will connect With you soon....');

     }
     // function scripe user
     public function stripe($totalprice)
     {
      return view('home.stripe',compact('totalprice'));

       
     }
     // function card pay user
     public function stripePost(Request $request ,$totalprice)
     {
      
         Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
     
         Stripe\Charge::create ([
                 "amount" => $totalprice * 100,
                 "currency" => "usd",
                 "source" => $request->stripeToken,
                 "description" => "Thank you payment" 

         ]);
         $user=Auth::user();
         $userid=$user->id;
         $data=cart::where('user_id','=',$userid)->get();
         foreach($data as $data){
            $order=new order;
            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->address=$data->address;
            $order->user_id=$data->user_id;
            $order->product_title=$data->product_title;
            $order->price=$data->price;
            $order->quantity=$data->quantity;
            $order->image=$data->image;
            $order->product_id=$data->product_id;
            $order->payment_status='Paid';
            $order->delivery_status='processing';
            $order->save();
            $cart_id=$data->id;
            $cart=cart::find($cart_id);
            $cart->delete();
   
         }
         
       
         Session::flash('success', 'Payment successful!');
               
         return back();
     }
     // function order admain
     public function order(){
      $order=order::all();
      return view('order',compact('order'));
     }
     // function delivered admain
     public function delivered($id){

      $order=order::find($id);
      $order->delivery_status="delivered";
      $order->payment_status='Paid';
      $order->save();
      return redirect()->back();



     }
     // function  admin to work pdf 
     public function print_pdf($id){
      $order=order::find($id);
      $pdf=PDF::loadView('pdf',compact('order'));
      return $pdf->download('order_detials.pdf');

     }
     // function to work send_email
     public function send_email($id){
      $order=order::find($id);
      return view('email_info',compact('order'));

     }
     //function send_user_email notification
     public function send_user_email(Request $request,$id){
      $order=order::find($id);
      $detials=[
         'greeting'=>$request->greeting,
         'firstline'=>$request->firstline,
         'body'=>$request->body,
         'button'=>$request->button,
         'url'=>$request->url,
         'lastline'=>$request->lastline,
      ];
      Notification::send($order,new SendEmailNotification($detials));
      return redirect()->back();

     }
     // function search Data
     public function search(Request $request)
     {
      $searchText=$request->search;
      $order=order::where('name','LIKE',"%$searchText%")->orWhere('phone','LIKE',"%$searchText%")->orWhere('product_title','LIKE',"%$searchText%")->get();
      return view('order',compact('order'));

     }
     // function show_order page user
     public function show_order(){

      if(Auth::id()){
         $user=Auth::user();
         $userid=$user->id;
         $order=order::where('user_id','=',$userid)->get();

         return view('home.order',compact('order'));
      }else{
         return redirect('login');

      }
     }
     // function cancel_order page user
     public function cancel_order($id){
      $order=order::find($id);
      $order->delivery_status='You Canceled The Order';
      $order->save();
      return redirect()->back();


     }
     // function to work add_comment userPage 
     public function add_comment(Request $request){
      if(Auth::id()){ 
         $comment=new comment;
         $comment->name=Auth::user()->name;
         $comment->user_id=Auth::user()->id;
         $comment->comment=$request->comment;
         $comment->save();
         return redirect()->back();
      }else{
         return redirect('login');
      }
}
// function work add_reply
public function add_reply(Request $request){
   if(Auth::id()){ 
      $reply=new reply;
      $reply->name=Auth::user()->name;
      $reply->user_id=Auth::user()->id;
      $reply->comment_id=$request->commentId;
      $reply->reply=$request->reply;
      $reply->save();
      return redirect()->back();
   }else{
      return redirect('login');
   }


}  
// function product_search UserPage
public function product_search(Request $request){
   $search_text=$request->search;
   $comment=comment::orderby('id','desc')->get();
   $reply=reply::all();
   $product=product::where('title','LIKE',"%$search_text%")->
   orWhere('catagory','LIKE',"%$search_text%")->paginate(10);
   return view('home.userpage',compact('product','comment','reply'));

}
// function work show products userpage
public function products(){
   $product=Product::paginate(3);
   $comment=comment::orderby('id','desc')->get();
   $reply=reply::all();
   $catagory=Catagory::all();
   
   
   return view('home.all_product',compact('product','comment','reply',"catagory"));
}
public function products_category($keyword){
   $product=Product::where('catagory',$keyword)->paginate(3);
   $catagory=Catagory::all();
   $comment=comment::orderby('id','desc')->get();
   $reply=reply::all();
   
   
   
   
   return view('home.all_product',compact('product','comment','reply',"catagory"));
}
// function work search_product special web page products
public function search_product(Request $request){
   $search_text=$request->search;
   $comment=comment::orderby('id','desc')->get();
   $reply=reply::all();
   $product=product::where('title','LIKE',"%$search_text%")->
   orWhere('catagory','LIKE',"%$search_text%")->paginate(10);
   return view('home.all_product',compact('product','comment','reply'));
}
     


}