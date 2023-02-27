@extends('admin.layout.master')
@section('dynamic-content')
<div class="container-fluid px-4 mt-5">
    <div class="card" >
        <div class="card-header d-flex" style="font-size:25px; color:grey">
            <span><strong>Manage Location</strong></span>
            <span class="ms-auto"><a href="{{route('admin.locations.index')}}"  class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Back</a></span>
            
        </div>
        <div class="card-body">
            @if(!isset($location))
            <form action ="{{route('admin.locations.store')}}" method="post">
                @else
            <form action ="{{route('admin.locations.update',$location->id)}}" method="post">
                @method('patch')
                @endif
                @csrf
                <div class="row">
                    <div class="col-md-2 ">
                        <label for="name" style="widht 100%" >Location Name :</label>
                    </div>
                    <div class="col-md-10 ">
                       
                        <input type="text"  name="name" placeholder="location name" value="{{old('name',@$location->name)}}" class="form-control">
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
                        <option value="1" {{old('status',@$location->status)  == '1' ?  'selected' : ''}} >Active</option>
                        <option value="0" {{old('status', @$location->status)  == '0' ?  'selected' : ''}}>Inactive</option>
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