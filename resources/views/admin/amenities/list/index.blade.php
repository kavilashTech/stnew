@extends('admin.layout.master')
@section('dynamic-content')
<div class="container-fluid px-4 mt-5">
    <div class="card" >
        <div class="card-header d-flex" style="font-size:25px; color:grey">
            <span style="display:flex;"><strong>Manage Amenities List - </strong><p style="font-size: 15px; line-height:42px">{{@$parentname ? $parentname->name : '' }}</p></span>
            <span class="ms-auto"><a href="{{route('admin.amenities.list.create',['parentid'=>$parentid])}}"  class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New</a></span>
        </div>
        <div class="card-body">
           @include('admin.layout.message')
            <table class="table table-striped table-bordered table-hover table-crud">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Value</th>
                        <th>action</th>
                        <th width="20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    @forelse ($lists as $key=>$lists)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$lists->name}}</td>
                            <td>{{$lists->value == 0  ? 'No' :'Yes'}}</td>
                            <td>@if($lists->icon)
                                    <img src="{{asset('public/images/'.$lists->icon)}} " width="100px" height="100px" >
                                @else
                                    <img src="{{asset('public/images/defaultcion.jpg')}} " width="100px" height="100px">
                                @endif
                            </td>
                            <td>                                
                                <a href="{{route('admin.amenities.list.edit',['id'=>$lists->id,'parentid'=>$parentid])}}" class="btn btn-info btn-rounded btn-icon" title="Edit"><i class="fa fa-sm fa-edit"></i> Edit</a> 
                                <button class="btn btn-danger btn-rounded btn-icon delete-btn" title="Delete" data-url="{{route('admin.amenities.list.destroy',['id'=>$lists->id])}}" type="button"> <i class="fa fa-sm fa-times"></i>Delete</button>
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