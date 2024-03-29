@extends('backend.layout.app2')
@section('title', 'Admin Masbro')
@section('content')
<!-- partial -->
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Add Parent Category Jobs</h4>
            <form class="forms-sample" method="POST">
            	@csrf
                <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" class="form-control" id="exampleInputName1" name="name" placeholder="Name">
                </div>                
                <div class="form-group">
                    <label for="exampleTextarea1">Textarea</label>
                    <textarea class="form-control" id="exampleTextarea1" name="meta_search" rows="10"></textarea>
                    <small>untuk penulisan meta search di kasih , tiap kata yang berbeda</small>
                </div>
                <button type="submit" class="btn btn-success mr-2">Submit</button>
                <a href="{{ route('parent-profesion') }}"  class="btn btn-light">Back to parent data </a>
            </form>
        </div>
    </div>
</div>
@endsection