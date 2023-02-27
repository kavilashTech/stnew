@extends('admin.layout.master')
@section('dynamic-content')
<div class="container-fluid px-4 mt-5">
    <div class="card" >
        <div class="card-header d-flex" style="font-size:25px; color:grey">
            <span><strong>Manage area</strong></span>
            <span class="ms-auto"><a href="{{route('admin.areas',['locationId'=>$locationId])}}"  class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Back</a></span>
            
        </div>
        <div class="card-body">
            @if(!isset($area))
            <form action ="{{route('admin.areas.store',['locationId'=>$locationId])}}" method="post">
                @else
            <form action ="{{route('admin.areas.update',['id'=>$area->id,'locationId'=>$locationId])}}" method="post">
                @method('patch')
                <input type="hidden" value="{{$locationId}}" name="location_id">
                <input type="hidden" value="{{$area->id}}" name="id">
                @endif
                @csrf
                <div class="row">
                    <div class="col-md-2 ">
                        <label for="name" style="widht 100%" >Area Name :</label>
                    </div>
                    <div class="col-md-10 ">                       
                        <input type="text"  name="name" placeholder="area name" value="{{old('name',@$area->name)}}" class="form-control">
                        @error('name')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror  
                    </div>
                    <div class="col-md-2 mt-3 ">
                        <label for="name" style="widht 100%" >Status:</label>
                    </div>
                    <div class="col-md-10 mt-3">
                       <select name="status" class="form-control" > 
                        <option value="1" {{old('status',@$area->status)  == '1' ?  'selected' : ''}} >Active</option>
                        <option value="0" {{old('status', @$area->status)  == '0' ?  'selected' : ''}}>Inactive</option>
                       </select>
                        @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-12 ">
                        <button type="submit" class="btn btnn-sm btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection