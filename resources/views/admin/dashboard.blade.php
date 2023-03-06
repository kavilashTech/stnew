@extends('admin.layout.master')
@section('dynamic-content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>     
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                Pending Owner Registrations
                            </div>
                            <div class="card-body">
                              <h5 class="card-title">You have {{ count($pending_owners)}} pending approvals</h5>
                              <div class="card-text">
                                <table class="table table-bordered table-hover">
                                    <tr>
                                        <th>User</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    @forelse ($pending_owners as $key => $user )
                                        <tr>
                                            <td>{{$user->display_name}}<p>{{ $user->city ? $user->city .',': ''}} {{$user->state ? $user->state : ''}}</p></td>
                                            <td><span class="badge badge-warning">Pending</span></td>
                                            <td>
                                                <button class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                <button class="btn btn-success approved" data-status="1"  data-userid="{{$user->id}}"><i class="fa fa-check" aria-hidden="true"></i></button>
                                                <button class="btn btn-danger approved" data-status="0"  data-userid="{{$user->id}}"><i class="fa fa-times" aria-hidden="true"></i></td></button>
                                        </tr>
                                    @empty
                                        <td colspan="3" style="text-align:center;font-weight:500">No Record Found</td>
                                    @endforelse
                                </table>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                Pending Staytype Approvals
                            </div>
                            <div class="card-body">
                              <h5 class="card-title">You have {{ count($pending_properties)}} pending approvals</h5>
                              <div class="card-text">
                                <table class="table table-bordered table-hover">
                                    <tr>
                                        <th>Staytype</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    @forelse ($pending_properties as $key => $type )
                                        <tr>
                                            <td>{{$type->property_title}}</td>
                                            <td><span class="badge badge-warning">Pending</span></td>
                                            <td>
                                                <button class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                <button class="btn btn-success approved-property" data-status="2" data-propertyid="{{$type->id}}" ><i class="fa fa-check" aria-hidden="true"></i></button>
                                                <button class="btn btn-danger approved-property" data-status="3" data-propertyid="{{$type->id}}"><i class="fa fa-times" aria-hidden="true"></i></td></button>
                                        </tr>
                                    @empty
                                        <td colspan="3" style="text-align:center;font-weight:500">No Record Found</td>
                                    @endforelse
                                </table>
                              </div>
                            </div>
                        </div>
                    </div>
              </div>
            </div>
          </div>  
    </div>
</main>
@push('custom-script')
<script>
    $('.approved').click(function(){
        let id = $(this).attr('data-userid');
        let status = $(this).attr('data-status');
        let msg= (status == 1) ? "Are you sure you want to approve this owner": "Are you sure you want to reject this owner" ;
        
        swal({
        title: "Are you sure?",
        text: msg,  
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        
        if (!willDelete) return false;
        $.ajax({
            url :"{{route('admin.ownerapprovel')}}",
            type: 'post',
            data:{'id':id, 'status':status},
            headers:{
                'accept':'application-json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(result){
                if(result.status == true ){
                    swal('',result.message,'success')
                    .then((value) => {
                      location.reload();
                    });
                }else{
                    swal('',result.message,'error')
                    .then((value) => {
                        location.reload();
                    });
                }
            }
        });
    });
    });



    $('.approved-property').click(function(){
        let id = $(this).attr('data-propertyid');
        let status = $(this).attr('data-status');
        let msg= (status == 2) ? "Are you sure you want to approve this property": "Are you sure you want to reject this property" ;
        
        swal({
        title: "Are you sure?",
        text: msg,  
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        
        if (!willDelete) return false;
        $.ajax({
              url :"{{route('admin.propertyapprovel')}}",
              type: 'post',
              data:{'id':id, 'status':status},
            headers:{
                'accept':'application-json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(result){
                if(result.status == true ){
                    swal('',result.message,'success')
                    .then((value) => {
                      location.reload();
                    });
                }else{
                    swal('',result.message,'error')
                    .then((value) => {
                        location.reload();
                    });
                }
            }
        });
    });
    });

    
</script>
@endpush
@endsection
