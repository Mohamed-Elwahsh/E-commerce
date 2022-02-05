<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <link href="{{ asset('css/userlogin.css') }}" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <title>User Registration</title>
</head>
<body>
   <div class="container">
      <div class="row">
		  <div class="col-md-5 mx-auto">
			<div id="first">
				<div class="myform form ">
					 <div class="logo mb-3">
						 <div class="col-md-12 text-center">
							<h1>User Registration</h1>
						 </div>
					</div>
                  <form action="{{ route('user.create') }}" method="post" name="register" autocomplete="off">
                    @if(Session::get('success'))
                       <div class="alert alert-success">
                           {{ (Session::get('success')) }}
                       </div>
                    @endif   
                    @if(Session::get('error'))
                       <div class="alert alert-danger">
                           {{ (Session::get('error')) }}
                       </div>
                    @endif   
                     @csrf
                     <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" name="name"  class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter name" value="{{ old('name') }}">
                        <span class="text-danger">@error('name') {{ $message }} @enderror</span>
                     </div>
                     <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email"  class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{ old('email') }}">
                        <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                     </div>
                     <div class="form-group">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="password" name="password" id="password"  class="form-control" aria-describedby="emailHelp" placeholder="Enter Password" value="{{ old('password') }}">
                        <span class="text-danger">@error('password') {{ $message }} @enderror</span>
                     </div>
                     <div class="form-group">
                        <label for="exampleInputEmail1">Confirm Password</label>
                        <input type="password" name="cpassword" id="cpassword"  class="form-control" aria-describedby="emailHelp" placeholder="Confirm Password" value="{{ old('cpassword') }}">
                        <span class="text-danger">@error('cpassword') {{ $message }} @enderror</span>
                     </div>
                     <br>
                     <div class="col-md-12 text-center ">
                        <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Register</button>
                     </div>
                     <div class="col-md-12 text-center ">
                        <a href="{{ route('user.login') }}">Have already account!, Login</a>
                     </div>
                     <br>
                     <div class="col-md-12 ">
                        <div class="login-or">
                           <hr class="hr-or">
                           <span class="span-or">User</span>
                        </div>
                     </div>
                  </form>
                 
				</div>
			</div>
        </div>
		</div>
   </div>   
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
<script src="{{ asset('js/userlogin.js') }}"></script>
</body>
</html> 