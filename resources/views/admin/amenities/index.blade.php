@extends('admin.layout.master')
@section('dynamic-content')
<div class="container-fluid px-4 mt-5">
    <div class="card" >
        <div class="card-header d-flex" style="font-size:25px; color:grey">
            <span><strong>Manage Amenities</strong></span>
            <span class="ms-auto"><a href="#"  class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New</a></span>
        </div>
        <div class="card-body">
           @include('admin.layout.message')
        
        </div>
    </div>
</div>
@endsection