@extends('admin.layout.master')
@section('dynamic-content')
<div class="container-fluid px-4 mt-5">
    <div class="card">
        <div class="card-header d-flex" style="font-size:25px; color:grey">
            <span><strong>Company Information</strong></span>
        </div>
        <div class="card-body">
            @include('admin.layout.message')
            <form id="form1" action="<?php $_PHP_SELF ?>">
                <div class="row mb-3">
                    <div class="col-md-8">
                        <!-- <div class="form-floating mb-3 mb-md-0"> -->
                        <label class="label-for-input" for="inputCompanyName">Company Name<span style="color:red">*</span></label>
                        <input class="form-control" id="inputCompanyName" name="inputCompanyName" type="text" placeholder="Enter Company name" value="" required />
                        
                        <!-- </div> -->
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <!-- <div class="form-floating"> -->
                        <label class="label-for-input" for="inputAddress1">Address 1<span style="color:red">*</span></label>
                        <input class="form-control" id="inputAddress1" name="inputAddress1" type="text" placeholder="Enter Address" value="" required />
                        
                        <!-- </div> -->
                    </div>
                    <div class="col-md-6">
                        <!-- <div class="form-floating"> -->
                        <label class="label-for-input" for="inputAddress2">Address 2</label>
                        <input class="form-control" id="inputAddress2" name="inputAddress2" type="text" placeholder="Enter Address" value="" />
                        
                        <!-- </div> -->
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <!-- <div class="form-floating"> -->
                        <label class="label-for-input" for="inputState">State<span style="color:red">*</span></label>
                        <input class="form-control" id="inputState" name="inputState" type="text" placeholder="Enter State" value="" required />
                        
                        <!-- </div> -->
                    </div>
                    <div class="col-md-4">
                        <!-- <div class="form-floating"> -->
                        <label class="label-for-input" for="inputCity">City<span style="color:red">*</span></label>
                        <input class="form-control" id="inputCity" name="inputCity" type="text" placeholder="Enter City" value="" required />
                        
                        <!-- </div> -->
                    </div>
                    <div class="col-md-4">
                        <!-- <div class="form-floating"> -->
                        <label class="label-for-input" for="inputPincode">Pincode<span style="color:red">*</span></label>
                        <input class="form-control" id="inputPincode" name="inputPincode" type="text" placeholder="Enter Pincode" value="" required />
                        
                        <!-- </div> -->
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <!-- <div class="form-floating mb-3"> -->
                        <label class="label-for-input" for="inputEmail1">Email address<span style="color:red">*</span></label>
                        <input class="form-control" id="inputEmail1" name="inputEmail1" type="email" placeholder="name@example.com" value="" required />
                        
                        <!-- </div> -->
                    </div>
                    <div class="col-md-6">
                        <!-- <div class="form-floating mb-3"> -->
                        <label class="label-for-input" for="inputEmail2">Email address 2</label>
                        <input class="form-control" id="inputEmail2" name="inputEmail2" type="email" placeholder="name@example.com" value="" />
                        
                        <!-- </div> -->
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <!-- <div class="form-floating mb-3 mb-md-0"> -->
                        <label class="label-for-input" for="inputMobile1">Mobile<span style="color:red">*</span></label>
                        <input class="form-control" id="inputMobile1" name="inputMobile1" type="text" placeholder="Enter Mobile" value="" required />
                        
                        <!-- </div> -->
                    </div>
                    <div class="col-md-6">
                        <!-- <div class="form-floating mb-3 mb-md-0"> -->
                        <label class="label-for-input" for="inputMobile2">Mobile 2</label>
                        <input class="form-control" id="inputMobile2" name="inputMobile2" type="text" placeholder="Enter Alternate Mobile" value="" />
                        
                        <!-- </div> -->
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <!-- <div class="form-floating mb-3 mb-md-0"> -->
                        <label class="label-for-input" for="inputPan">PAN</label>
                        <input class="form-control" id="inputPan" name="inputPan" type="text" placeholder="Enter PAN No" value="" />
                        
                        <!-- </div> -->
                    </div>
                    <div class="col-md-6">
                        <!-- <div class="form-floating mb-3 mb-md-0"> -->
                        <label class="label-for-input" for="inputGst">GST</label>
                        <input class="form-control" id="inputGst" name="inputGst" type="text" placeholder="Enter GST No" value="" />
                        
                        <!-- </div> -->
                    </div>
                </div>
                <div class="mt-4 mb-0 ">
                    <div class="form-floating mb-3 mb-md-0">
                        <h5 id="success" name="success" style="color:green;text-align:center"></h5>
                        <h5 id="error" name="error" style="color:red;text-align:center"></h5>
                    </div>
                    <input type="hidden" id="txtSubmit" name="txtSubmit">
                    <!-- <div id="btnSave" name="btnSave" class="d-grid  justify-content-center "><a class="btn btn-primary btn-block" onclick="submitform()">Save Company</a></div> -->
                    <input type="submit" class="btn btn-success" value="Save Company">
                </div>
            </form>
        </div>
    </div>
    <!-- </div> -->
</div>
@endsection