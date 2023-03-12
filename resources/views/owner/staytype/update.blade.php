@extends('owner.layout.master')
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
                        {{-- <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control">
                            </div>
                        </div> --}}
                        <h1>Basic</h1>

                        <button type = "button" onclick = "changeForm(2)">Save</button>
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
                $('#form1').addClass('d-none');
                $('#form2').addClass('d-block');
                $('#form2').removeClass('d-none');

                $('#basic').addClass('active');
                
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