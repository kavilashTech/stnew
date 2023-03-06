@extends('admin.layout.master')
@section('dynamic-content')
<div class="container-fluid px-4 mt-5">
    <div class="card" >
        <div class="card-header d-flex" style="font-size:25px; color:grey">
            <span><strong>Manage Amenities</strong></span>
            <span class="ms-auto"><a href="{{route('admin.amenities.create',['level'=>$level])}}"  class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New</a></span>
        </div>
        <div class="card-body">
           @include('admin.layout.message')
            <table class="table table-striped table-bordered table-hover table-crud">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Show In Detail</th>
                        <th>Type</th>
                        <th>action</th>
                        <th width="20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    @forelse ($amenities as $key=>$amenity)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$amenity->name}}</td>
                            <td>{{$amenity->show_in_detail == 0  ? 'No' :'Yes'}}</td>
                            <td>{{$amenity->type == 0  ? 'No' :'Yes'}}</td>
                            <td>@if($amenity->icon)
                                    <img src="{{asset('public/images/'.$amenity->icon)}} " width="100px" height="100px" >
                                @else
                                    <img src="{{asset('public/images/defaultcion.jpg')}} " width="100px" height="100px">
                                @endif
                            </td>
                            <td>                                
                                <a href="{{route('admin.amenities.edit',['id'=>$amenity->id,'level'=>$level])}}" class="btn btn-info btn-rounded btn-icon" title="Edit"><i class="fa fa-sm fa-edit"></i> Edit</a> 

                                <a href="{{route('admin.amenities.list',['parentid'=>$amenity->id])}}" class="btn btn-primary btn-rounded btn-icon" title="Amenities List" > <i class="fa fa-sm fa-list"></i>List</a>


                                <button class="btn btn-danger btn-rounded btn-icon delete-btn" title="Delete" data-url="{{route('admin.amenities.destroy',$amenity->id)}}" type="button"> <i class="fa fa-sm fa-times"></i>Delete</button>
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