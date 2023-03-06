@extends('admin.layout.master')
@section('dynamic-content')
<div class="container-fluid px-4 mt-5">
    <div class="card" >
        <div class="card-header d-flex" style="font-size:25px; color:grey">
            <span style="display:flex"><strong >Manage Amenitites List - </strong><p style ="font-size: 16px;
                line-height: 42px;">{{@$parentname ? $parentname->name : '' }}</p></span>
            <span class="ms-auto"><a href="{{route('admin.amenities.list',['parentid'=>$parentid])}}"  class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Back</a></span>            
        </div>
        <div class="card-body">
            @if(!isset($amenitylist))
            <form action ="{{route('admin.amenities.list.store',['parentid'=>$parentid])}}" method="post">
                @else
            <form action ="{{route('admin.amenities.list.update',['id'=>$amenitylist->id,'parentid'=>$amenitylist->amenity_id])}}" method="post">
                @method('patch')
                @endif
                @csrf
                <div class="row">
                    <div class="col-md-2 ">
                        <label for="name" style="widht 100%" >Name :</label>
                    </div>
                    <div class="col-md-10 ">                  
                        <input type="text"  name="name" placeholder="Name" value="{{old('name',@$amenitylist->name)}}" class="form-control">
                        <input type="hidden" name = "amenity_id" value="{{$parentid}}">
                        @error('name')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror  
                    </div>
                    <div class="col-md-2 mt-3 ">
                        <label for="status" style="widht 100%" >Value:</label>
                    </div>
                    <div class="col-md-10 mt-3">
                       <select name="value" class="form-control" > 
                        <option value="1" {{old('value',@$amenitylist->value)  == '1' ?  'selected' : ''}} >Yes</option>
                        <option value="0" {{old('value', @$amenitylist->value)  == '0' ?  'selected' : ''}}>No</option>
                       </select>
                        @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                   
                    <div class="col-md-2 mt-3">
                        <label for="icon" style="widht 100%" >Icon :</label>
                    </div>
                    <div class="col-md-10 mt-3 ">                       
                        <input type="text"  name="icon" placeholder="icon" value="{{old('icon',@$amenitylist->icon)}}" class="form-control">
                        @error('icon')
                            <span class="invalid-feedback d-block" role="alert">
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