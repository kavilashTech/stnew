@extends('admin.layout.master')
@section('dynamic-content')
<div class="container-fluid px-4 mt-5">
    <div class="card" >
        <div class="card-header d-flex" style="font-size:25px; color:grey">
            <span><strong>Manage Stay Type</strong></span>
            <span class="ms-auto"><a href="{{route('admin.properties-categories.create')}}"  class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New</a>
        </div>
        <div class="card-body">
           @include('admin.layout.message')
            <table class="table table-striped table-bordered table-hover table-crud">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Sort order</th>
                        <th width="20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    @forelse ($categories as $key=>$type)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$type->categoryname}}</td>
                            <td>{{$type->sortorder}}</td>
                            <td>
                                <a href="{{route('admin.properties-categories.edit',['properties_category'=>$type->id])}}" class="btn btn-info btn-rounded btn-icon" title="Edit"><i class="fa fa-sm fa-edit"></i> Edit</a>
                                <button class="btn btn-danger btn-rounded btn-icon delete-btn" title="Delete" data-url="{{route('admin.properties-categories.destroy',['properties_category'=>$type->id])}}" type="button"> <i class="fa fa-sm fa-times"></i>Delete</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" style="text-align: center">No Records Found</td>
                        </tr>
                    @endforelse 
                </tbody>
            </table>
        </div>
    </div>
    <!-- </div> -->
</div>
@endsection