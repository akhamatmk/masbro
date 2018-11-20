@extends('layout.app')
@section('title', 'Login Page Masbro')
@section('content')
<style type="text/css">
	.section-full:last-child {
	    margin-bottom: 0px;
	}
</style>
	<!-- contact area -->
        <div class="content-block" style="min-height: 500px">
			<!-- Submit Resume -->
			<div class="section-full bg-white submit-resume content-inner-2" style="padding-top: 35px; padding-bottom: 20px;">
				<div class="container">
					<div class="row">
						<div class="col-md-7 col-lg-9" style="box-shadow: 0 0 10px 0 rgba(0,24,128,0.1);">
							 @if(Session::has('message-succes'))
		                        <div class="alert alert-success">
		                             <ul>                                
		                                 <li>{{ Session::get('message-succes') }}</li>
		                             </ul>
		                         </div>
		                     @endif
							<form method="POST" style="margin-top: 10px" enctype="multipart/form-data">
								@csrf
								<div class="form-group">
									<label>Kampus / Sekolah</label>
									<input type="text" name="school" class="form-control" placeholder="Your School">
								</div>

								<div class="form-group">
									<label>Degree</label>
									<input type="text" name="degree" class="form-control" placeholder="Your Degree">
								</div>

								<div class="form-group">
									<label>Field of study</label>
									<input type="text" name="field_of_study" class="form-control" placeholder="Your field of study">
								</div>

								<div class="form-group">
									<label>From Year</label>
									<select name="from" id="from">
										<option value="0">Silahkan Pilih</option>
										@for($a = date('Y'); $a > 1960; $a --)
											<option value="{{ $a }}">{{ $a }}</option>
										@endFor
									</select>
								</div>

								<div class="form-group">
									<label>To Year</label>
									<select name="until" id="until">
										<option value="0">Silahkan Pilih</option>
										@for($a = date('Y'); $a > 1960; $a --)
											<option value="{{ $a }}">{{ $a }}</option>
										@endFor
									</select>
								</div>
								<button type="submit" class="site-button" style="margin-bottom: 10px;">Submit</button>
							</form>
						</div>
					</div>
				</div>
			</div>
            <!-- Submit Resume END -->
		</div>
    <!-- Content END-->


@endsection

@section('js')
<script type="text/javascript">
	$(function() {
    	
	});
</script>

@endsection