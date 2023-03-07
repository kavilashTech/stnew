@extends('admin.layout.master')
@section('dynamic-content')
<div class="container-fluid px-4 mt-5">
    <div class="card" >
        <div class="card-header d-flex" style="font-size:25px; color:grey">
            <span><strong>Manage Amenitites</strong></span>
            <span class="ms-auto"><a href="{{route('admin.amenities',['level'=>$level])}}"  class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Back</a></span>            
        </div>
        <div class="card-body">
            @if(!isset($amenity))
            <form action ="{{route('admin.amenities.create.store')}}" method="post">
                @else
            <form action ="{{route('admin.amenities.update',['id'=>$amenity->id,'level'=>$level])}}" method="post">
                @method('patch')
                @endif
                @csrf
                <div class="row">
                    <div class="col-md-2 ">
                        <label for="name" style="widht 100%" >Name :</label>
                    </div>
                    <div class="col-md-10 ">                       
                        <input type="text"  name="name" placeholder="Name" value="{{old('name',@$amenity->name)}}" class="form-control">
                        <input type="hidden" name = "level" value="{{$level}}">
                        @error('name')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror  
                    </div>
                    <div class="col-md-2 mt-3 ">
                        <label for="status" style="widht 100%" >Show on property detail page:</label>
                    </div>
                    <div class="col-md-10 mt-3">
                       <select name="show_in_detail" class="form-control" > 
                        <option value="1" {{old('show_in_detail',@$amenity->show_in_detail)  == '1' ?  'selected' : ''}} >Yes</option>
                        <option value="0" {{old('show_in_detail', @$amenity->show_in_detail)  == '0' ?  'selected' : ''}}>No</option>
                       </select>
                        @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-2 mt-3 ">
                        <label for="status" style="widht 100%" >Type:</label>
                    </div>
                    <div class="col-md-10 mt-3">
                       <select name="type" class="form-control" > 
                        <option value="1" {{old('type',@$amenity->type)  == '1' ?  'selected' : ''}} >Yes</option>
                        <option value="0" {{old('type', @$amenity->type)  == '0' ?  'selected' : ''}}>No</option>
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
                        <input type="text"  name="icon" placeholder="icon" value="{{old('icon',@$amenity->icon)}}" class="form-control">
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