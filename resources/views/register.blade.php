@extends('layout.app')
@section('title', 'Login Page Masbro')
@section('content')
<!-- contact area -->
<div class="section-full content-inner shop-account">
            <!-- Product -->
            <div class="container">
                <div class="row">
					<div class="col-md-12 text-center">
						<h3 class="font-weight-700 m-t0 m-b20">Create An Account</h3>
					</div>
				</div>
                <div class="row">
					<div class="col-md-12 m-b30">
						<div class="p-a30 border-1  max-w500 m-auto">
							<div class="tab-content">
								<form id="login" method="post" class="tab-pane active">
									@csrf
									<h4 class="font-weight-700">PERSONAL INFORMATION</h4>
									<p class="font-weight-600">If you have an account with us, please log in.</p>

									@if ($errors->any())
									    <div class="alert alert-danger">
									        <ul>
									            @foreach ($errors->all() as $error)
									                <li>{{ $error }}</li>
									            @endforeach
									        </ul>
									    </div>
									@endif

									<div class="form-group">
										<label class="font-weight-700">First Name *</label>
										<input name="first_name" required="" class="form-control" placeholder="First Name" type="text">
									</div>
									<div class="form-group">
										<label class="font-weight-700">Last Name *</label>
										<input name="last_name" required="" class="form-control" placeholder="Last Name" type="text">
									</div>

									<div class="form-group">
										<label class="font-weight-700">UserId *</label>
										<input name="user_id" required="" class="form-control" placeholder="UserID" type="text">
									</div>

									<div class="form-group">
										<label class="font-weight-700">Full Name *</label>
										<input name="name" required="" class="form-control" placeholder="Full Name" type="text">
									</div>
									<div class="form-group">
										<label class="font-weight-700">E-MAIL *</label>
										<input name="email" required="" class="form-control" placeholder="Your Email Id" type="email">
									</div>
									<div class="form-group">
										<label class="font-weight-700">PASSWORD *</label>
										<input name="password" required="" class="form-control " placeholder="Type Password" type="password">
									</div>
									<div class="text-left">
										<button class="site-button button-lg outline outline-2">CREATE</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
            <!-- Product END -->
		</div>
<!-- contact area  END -->
</div>
@endsection