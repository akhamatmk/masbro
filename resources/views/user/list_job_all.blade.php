@extends('layout.app')
@section('title', 'Login Page Masbro')
@section('content')

<!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="dez-bnr-inr overlay-black-middle" style=");">
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">Browse Jobs</h1>
					<!-- Breadcrumb row -->
					<div class="breadcrumb-row">
						<ul class="list-inline">
							<li><a href="#">Home</a></li>
							<li>Browse Jobs</li>
						</ul>
					</div>
					<!-- Breadcrumb row END -->
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- contact area -->
        <div class="content-block">
			<!-- Browse Jobs -->
			<div class="section-full bg-white browse-job content-inner-2">
				<div class="container">
					<div class="row">
						<div class="col-xl-9 col-lg-8">
							<h5 class="widget-title font-weight-700 text-uppercase">Recent Jobs</h5>
							<ul class="post-job-bx">
								@foreach($jobs as $job)
								<li>
									<a href="{{ url('job/detail/'.$job->id) }}">
										<div class="d-flex m-b30">
											<div class="job-post-company">
												<span><img src="{{ asset('images/profile-picture-user/'.$job->user->profile_image) }}"></span>
											</div>
											<div class="job-post-info">
												<h4>{{ $job->title }}</h4>
												<ul>
													<li><i class="fa fa-map-marker"></i> {{ $job->regency->name ? $job->regency->name : "" }}, {{ $job->provincy->name ? $job->provincy->name : "" }}</li>
													<li><i class="fa fa-bookmark-o"></i> 
														{{ $type[$job->type_jobs] ? $type[$job->type_jobs] : "" }}
													</li>
													<li><i class="fa fa-clock-o"></i> Published {{ k99_relative_time($job->created_at) }}</li>
												</ul>
											</div>
										</div>
										<div class="d-flex">
											<div class="job-time mr-auto">
												<span>Full Time</span>
											</div>
											<div class="salary-bx">
												<span>{{ $job->sallary }}</span>
											</div>
										</div>
										<span class="post-like fa fa-heart-o"></span>
									</a>
								</li>
								@endForeach
								
							<!-- <div class="pagination-bx m-t30">
								<ul class="pagination">
									<li class="previous"><a href="#"><i class="ti-arrow-left"></i> Prev</a></li>
									<li class="active"><a href="#">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li class="next"><a href="#">Next <i class="ti-arrow-right"></i></a></li>
								</ul>
							</div> -->
						</div>
					</div>
				</div>
			</div>
            <!-- Browse Jobs END -->
		</div>
    </div>
    <!-- Content END-->

@endsection

@section('js')
<script type="text/javascript">
	$(function() {

	});
    	
</script>

@endsection