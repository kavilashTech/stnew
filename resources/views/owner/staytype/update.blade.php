@extends('owner.layout.master')
@push('custom-style')
    <style>
        .error{
            color:red;
        }
    </style>
@endpush
@section('dynamic-content')
<div class="container-fluid px-4 mt-5">
    <div class="card" >
        <div class="card-header d-flex" style="font-size:25px; color:grey">
            <span><strong>Edit Staytype</strong></span>            
        </div>
        <div class="card-body">
            <div>     
                <ul id="progressbar">
                    <li  id="basic"><strong>Basic</strong></li>
                    <li id="media"><strong>Media</strong></li>
                    <li id="Amenities"><strong>Amenities</strong></li>
                    <li id="Worktime"><strong>Work Time</strong></li>
                    <li id="Terms"><strong>Policies / rules.</strong></li>
                    <li id="Acceptance"><strong>Acceptance</strong></li>
                </ul>
            </div>
            <div class="card border">
                <div class="card-header">
                    Basic Info
                </div>
                <div class="card-body">
                    <form id="form1">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="hidden" name="step" value="step1">
                                <label for="property_title">Property Title<span style="color: red;font-size:18px;"><b>*</b></label>
                                {{ Form::text("property_title", old("property_title"), ["class" => "form-control ", "placeholder" => "Enter property_title", "id" => "property_title", 'required'=>'true']) }}
                                @error("property_title")
                                    <p style="color:red;">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="short_description">Short Description</label>
                                {{ Form::text("short_description", old("short_description"), ["class" => "form-control ", "placeholder" => "Enter short_description", "id" => "short_description"]) }}
                                @error("short_description")
                                    <p style="color:red;">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="description">Description</label>
                                {{ Form::text("description", old("description"), ["class" => "form-control ", "placeholder" => "Enter description", "id" => "description"]) }}
                                @error("description")
                                    <p style="color:red;">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="address1">Address1</label>
                                {{ Form::text("address1", old("address1"), ["class" => "form-control ", "placeholder" => "Enter address1", "id" => "address1"]) }}
                                @error("address1")
                                    <p style="color:red;">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="address2">Address2</label>
                                {{ Form::text("address2", old("address2"), ["class" => "form-control ", "placeholder" => "Enter address2", "id" => "address2"]) }}
                                @error("address2")
                                    <p style="color:red;">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="state">State</label>
                                {{ Form::text("state", old("state"), ["class" => "form-control ", "placeholder" => "Enter state", "id" => "state"]) }}
                                @error("state")
                                    <p style="color:red;">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="city">City</label>
                                {{ Form::text("city", old("city"), ["class" => "form-control ", "placeholder" => "Enter city", "id" => "city"]) }}
                                @error("city")
                                    <p style="color:red;">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="mobile1">Mobile1</label>
                                {{ Form::text("mobile1", old("mobile1"), ["class" => "form-control ", "placeholder" => "Enter mobile1", "id" => "mobile1"]) }}
                                @error("mobile1")
                                    <p style="color:red;">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="pincode">Pincode</label>
                                {{ Form::text("pincode", old("pincode"), ["class" => "form-control ", "placeholder" => "Enter pincode", "id" => "pincode"]) }}
                                @error("pincode")
                                    <p style="color:red;">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="mobile2">Mobile2</label>
                                {{ Form::text("mobile2", old("mobile2"), ["class" => "form-control ", "placeholder" => "Enter mobile2", "id" => "mobile2"]) }}
                                @error("mobile2")
                                    <p style="color:red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <button type = "submit" class="btn btn-primary" onclick = "changeForm(2)">Save</button>
                    </form>
                    <form class="d-none" id="form2">
                        <h1>Media</h1>
                        <button type = "button" onclick = "changeForm(3)" on>Save</button>
                    </form>

                    <form class="d-none" id="form3">
                        <h1>Amenities</h1>
                        <button type = "button" onclick = "changeForm(4)" on>Save</button>
                    </form>

                    <form class="d-none" id="form4">
                        <h1>Work Time</h1>
                        <button type = "button" onclick = "changeForm(5)" on>Save</button>
                    </form>

                    <form class="d-none" id="form5">
                        <h1>Policies / rules.</h1>
                        <button type = "button" onclick = "changeForm(6)" on>Save</button>
                    </form>

                    <form class="d-none" id="form6">
                        <h1>Acceptance</h1>
                        <button type = "button" onclick = "changeForm(7)" on>Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('custom-script')
    <script>
        
        function changeForm(id){
            if(id == 2) {
                $("#form1").validate({
                rules: {
                    property_title: {
                        required: true,
                        maxlength: 50
                    }
                },
                submitHandler: function(form, event) { 
                    event.preventDefault();
                    $.ajax({
                        type: 'patch',
                        url: "{{route('owner.staytype.update',['staytype'=>$id])}}",
                        data: $("#form1").serialize(),      
                        headers:{
                            'accept':'application-json',
                            'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
                        },               
                        success: function(response) {
                            
                        }
                    });
                }
            });

                // $('form1').validate();
                // $('#form1').addClass('d-none');
                // $('#form2').addClass('d-block');
                // $('#form2').removeClass('d-none');

                // $('#basic').addClass('active');
                
            }else if(id == 3){
                $('#form2').addClass('d-none');
                $('#form2').removeClass('d-block');
                $('#form3').addClass('d-block');
                $('#form3').removeClass('d-none');
                $('#media').addClass('active');
            }
            else if(id == 4){
                $('#form3').addClass('d-none');
                $('#form3').removeClass('d-block');
                $('#form4').addClass('d-block');
                $('#form4').removeClass('d-none');

                $('#Amenities').addClass('active');
            }
            else if(id == 5){
                $('#form4').addClass('d-none');
                $('#form4').removeClass('d-block');
                $('#form5').addClass('d-block');
                $('#form5').removeClass('d-none');

                $('#Worktime').addClass('active');
            }
            else if(id == 6){
                $('#form5').addClass('d-none');
                $('#form5').removeClass('d-block');
                $('#form6').addClass('d-block');
                $('#form6').removeClass('d-none');

                $('#Terms').addClass('active');
            }
            else{
                $('#form1').removeClass('d-none');
                $('#form1').addClass('d-block');
                $('#form6').removeClass('d-block');
                $('#form6').addClass('d-none');

                $('#Acceptance').addClass('active');
            }
        }
    </script>
@endpush
@endsection