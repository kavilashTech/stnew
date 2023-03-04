@extends('admin.layout.master')
@section('dynamic-content')
<div class="container-fluid px-4 mt-5">
    <div class="card" >
        <div class="card-header d-flex" style="font-size:25px; color:grey">
            <span><strong>Manage Stay Type</strong></span>
            <span class="ms-auto"><a href="{{route('admin.properties-categories.index')}}"  class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Back</a></span>            
        </div>
        <div class="card-body">
            @if(!isset($staytype))
            <form action ="{{route('admin.properties-categories.store')}}" method="post">
                @else
            <form action ="{{route('admin.properties-categories.update',['properties_category'=>$staytype->id])}}" method="post">
                @method('patch')
                @endif
                @csrf
                <div class="row">
                    <div class="col-md-2 ">
                        <label for="categoryname" style="widht 100%" >Name :</label>
                    </div>
                    <div class="col-md-10 ">                       
                        <input type="text"  name="categoryname" placeholder="name" value="{{old('categoryname',@$staytype->categoryname)}}" class="form-control">
                        @error('categoryname')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror  
                    </div>
                    <div class="col-md-2  mt-3  ">
                        <label for="name" style="widht 100%" >Sort Order :</label>
                    </div>
                    <div class="col-md-10  mt-3  ">                       
                        <input type="text"  name="sortorder" placeholder="order" value="{{old('sortorder',@$staytype->sortorder)}}" class="form-control">
                        @error('sortorder')
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
                        <option value="1" {{old('status',@$staytype->status)  == '1' ?  'selected' : ''}} >Active</option>
                        <option value="0" {{old('status', @$staytype->status)  == '0' ?  'selected' : ''}}>Inactive</option>
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