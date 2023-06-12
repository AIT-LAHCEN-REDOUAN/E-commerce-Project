
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
			<h1><img src="{{asset('images/5.png')}}" alt="">PcHub</h1>
		</div>

		<div class="design-w3l">
			<div class="mail-form-agile">
                @if(session("status"))
                    <div style="color: #155724;
                    background-color: #d4edda;
                    border-color: #c3e6cb;
                    padding: 0.75rem 1.25rem;
                    margin-bottom: 1rem;
                    border: 1px solid transparent;
                    border-radius: 0.25rem;">
                        {{session("status")}}
                    </div>
                @endif
				<form action="{{route('password.request')}}" method="post">
                    @csrf
					<input type="text" name="email" placeholder="email..." required/>
                    @error('email')
                        <span style="color: crimson">
                          <strong>
                            {{$message}}
                          </strong>
                        </span>
                    @enderror
                    <br>
                    <br>
                    <br>
					<input type="submit" value="Reset">
				</form>
                <br> 
            <a style="color: aqua ; text-decoration: underline ;" href="{{route('register')}}">Create Account</a>    
			</div>
            
		</div>
	</div>
</body>
</html>