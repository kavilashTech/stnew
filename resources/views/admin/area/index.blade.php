@extends('admin.layout.master')
@section('dynamic-content')
<div class="container-fluid px-4 mt-5">
    <div class="card" >
        <div class="card-header d-flex" style="font-size:25px; color:grey">
            <span><strong>Manage Area</strong></span>
            <span class="ms-auto"><a href="{{route('admin.areas.create',['locationId'=>$locationId])}}"  class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New</a>
            <a href="{{route('admin.locations.index')}}"  class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>Location</a></span>
        </div>
        <div class="card-body">
           @include('admin.layout.message')
            <table class="table table-striped table-bordered table-hover table-crud">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Area Name</th>
                        <th width="20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    @forelse ($areas as $key=>$area)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$area->name}}</td>
                            <td>
                                <a href="{{route('admin.areas.edit',['id'=>$area->id,'locationId'=>$locationId])}}" class="btn btn-info btn-rounded btn-icon" title="Edit"><i class="fa fa-sm fa-edit"></i> Edit</a>
                                <button class="btn btn-danger btn-rounded btn-icon delete-btn" title="Delete" data-url="{{route('admin.areas.delete',['id'=>$area->id,'locationId'=>$locationId])}}" type="button"> <i class="fa fa-sm fa-times"></i>Delete</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>NO Records Found</td>
                        </tr>
                    @endforelse 
                </tbody>
            </table>
        </div>
    </div>
    <!-- </div> -->
</div>
@endsection