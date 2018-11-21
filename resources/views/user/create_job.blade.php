@extends('layout.app')
@section('title', 'Login Page Masbro')
@section('content')

<style type="text/css">
	.section-full:last-child {
	    margin-bottom: 0px;
	}
</style>
	<!-- contact area -->
        <div class="content-block">
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
									<label>Title Job</label>
									<input type="text" name="title" class="form-control" placeholder="Your Title Job">
								</div>

								<div class="form-group">
									<label for="category_job_id">Category Pekerjaan</label>
									<select name="category_job_id" id="category_job_id">
										<option value="0">Silahkan Pilih</option>
										@foreach($categories as $categorie)
											<option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
										@endForeach
									</select>
								</div>

								<div class="form-group">
									<label for="type_jobs">Type Pekerjaan</label>
									<select name="type_jobs" id="type_jobs">
										@foreach($types as $key => $type)
											<option value="{{ $key }}">{{ $type }}</option>
										@endForeach
									</select>
								</div>

								<div class="form-group">
									<label>Deskripsi Pekerjaan</label>
									<textarea name="job_description" id="job_description" class="form-control" placeholder="Deskripsi Pekerjaan"></textarea>
								</div>

								<div class="form-group">
									<label>How To Apply</label>
									<textarea name="how_to_apply" id="how_to_apply" class="form-control" placeholder="Cara Melamar"></textarea>
								</div>

								<div class="form-group">
									<label>Requirements</label>
									<textarea name="job_requirements" id="job_requirements" class="form-control" placeholder="Requirements"></textarea>
								</div>

								<div class="form-group">
									<label>Salary</label>
									<input type="text" name="sallary" class="form-control" placeholder="Ex 12.000.000">
								</div>

								<div class="form-group">
									<label>Type Salary</label>
									<select name="type_payment" id="type_payment">
										<option value='1'>Bulanan</option>
										<option value='2'>Mingguan</option>
										<option value='3'>Harian</option>
									</select>
								</div>

								<div class="form-group">
									<label>Experience</label>
									<input type="text" name="experience" id="experience" class="form-control" placeholder="Ex Freshgraduate Welcome">
								</div>

								<div class="form-group">
									<label>Batas Akhir Pendaftaram</label>
									<input type="text" name="deadline_jobs" class="form-control col-md-4" id="deadline_jobs" autocomplete="off">
								</div>

								<div class="form-group">
									<label for="province_id">Provinsi alamat</label>
									<select name="province_id" id="province_id">
										<option value="0">Silahkan Pilih</option>
										@foreach($provinces as $province)
											<option value="{{ $province->id }}">{{ $province->name }}</option>
										@endForeach
									</select>
								</div>								

								<div class="form-group">
									<label for="regency_id">Kota / Kabupaten alamat</label>
									<select name="regency_id" id="regency_id">
										<option value="0">Silahkan Pilih</option>
									</select>
								</div>

								<div class="form-group">
									<label>Detail Alamat</label>
									<textarea name="addreess" id="addreess" class="form-control" placeholder="Alamat"></textarea>
								</div>

								<button type="submit" class="site-button" style="margin-bottom: 10px;">Submit</button>
							</form>
						</div>						
					</div>
				</div>
			</div>
            <!-- Submit Resume END -->
		</div>
    </div>
    <!-- Content END-->


@endsection

@section('js')
<script type="text/javascript">
	$(function() {
		
		$('#deadline_jobs').datepicker({ dateFormat: 'yy-mm-dd' });

    	$("#province_id").change(function(){
			$.ajax({
				type: "GET",
				url: '{{ URL::to("place/regencyAjax") }}/'+$(this).val(),
				dataType: 'json',
				success: function(data){
					$("#regency_id").html("");
					$.each( data.data, function( key, value ) {
						var type = "Kota";
						if(value.type == 1)
							var type = "Kabupaten";

							$('#regency_id').append($('<option>', {
        						value: value.id,
        						text: type+" "+value.name
      						}));
					});
					 $('#regency_id').selectpicker('refresh');
				}
			});
		});		
	});
</script>

@endsection