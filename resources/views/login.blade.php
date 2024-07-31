<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="{{ asset('loginnn/style.css') }}" />

	<title>Sign in </title>
</head>
<body>
	<div class="container">
		<div class="forms-container">
      
			<div class="signin-signup">
               
				<form action="{{ route('loginuser')}}" method="POST" enctype="multipart/form-data" class="sign-in-form">
                    @csrf
					<h2 class="title">Sign up</h2>
          @if (session('error'))
          <div class="alert alert-danger " style="color: red;">
              {{ session('error') }}
          </div>
        @endif
					<div class="input-field">
						<i class="fas fa-user"></i>
						<input type="text" placeholder="Email" name="email" />
					</div>
					<div class="input-field">
						<i class="fas fa-lock"></i>
						<input type="password" placeholder="Password" name="password"/>
					</div>
					<input type="submit" value="Login" class="btn solid" />
			
				</form>
				
			</div>
		</div>
		<div class="panels-container">
			<div class="panel left-panel">
				<div class="content">
					<h3>CRM</h3>
					<p>
						Discover a world of possibilities! Join us and explore a vibrant
          community where ideas flourish and connections thrive.
					</p>	
				</div>
				<img  src="https://i.ibb.co/6HXL6q1/Privacy-policy-rafiki.png" class="image" alt="" />
			</div>
		</div>
	</div>

</body>


</html>