
<!DOCTYPE html>
<html>

<head>
<title>PcHub</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Gaming Login Form Widget Tab Form,Login Forms,Sign up Forms,Registration Forms,News letter Forms,Elements"/>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="{{asset('css/style1.css')}}" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
	<div class="padding-all">
		<div class="header">
			<img src="{{asset('images/pfelogo.png')}}" alt="">
		</div>

		<div class="design-w3l">
			<div class="mail-form-agile">
				<form action="{{route('register')}}" method="post">
                    @csrf
                    <input type="text" name="name" placeholder="name..." required/>
                    @error('email')
                    <span style=" color: rgb(144, 65, 81);
                    background-color: coral;
                    border-color: #c3e6cb;
                    padding: 0.75rem 1.25rem;
                    margin-bottom: 1rem;
                    border: 1px solid transparent;
                    border-radius: 0.25rem;
                    display: inline-block;
                    margin-top: 5px;">
                        {{$message}}
                    </span>
                @enderror
					<input type="text" name="email" placeholder="email..." required/>
                    @error('name')
                    <span style=" color: rgb(144, 65, 81);
                    background-color: coral;
                    border-color: #c3e6cb;
                    padding: 0.75rem 1.25rem;
                    margin-bottom: 1rem;
                    border: 1px solid transparent;
                    border-radius: 0.25rem;
                    display: inline-block;
                    margin-top: 5px;">
                        {{$message}}
                    </span>
                @enderror
					<input type="password" name="password" class="padding" placeholder="Password" required=""/>
                    @error('password')
                    <span style=" color: rgb(144, 65, 81);
                    background-color: coral;
                    border-color: #c3e6cb;
                    padding: 0.75rem 1.25rem;
                    margin-bottom: 1rem;
                    border: 1px solid transparent;
                    border-radius: 0.25rem;
                    display: inline-block;
                    margin-top: 5px;">
                        {{$message}}
                    </span>
                @enderror
                    <input type="password" name="password_confirmation" class="padding" placeholder="Password Confirmation" required/>
					<input type="submit" value="Create Account">
				</form>
                <br> 
            <a style="color: aqua ; text-decoration: underline" href="{{route('login')}}">Login</a>    
			</div>
            
		</div>
	</div>
</body>
</html>