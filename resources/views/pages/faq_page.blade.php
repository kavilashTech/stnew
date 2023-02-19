@extends('layouts.user')

<link rel="stylesheet" href="{{url('css1/style.css')}}"/>
<link rel="stylesheet" href="{{url('css1/aos.css')}}">
<link rel="stylesheet" href="{{url('css1/magnific.css')}}">
<link rel="stylesheet" href="{{url('css1/owl.css')}}"/>
<link rel="stylesheet" href="{{url('css1/bootstrap.min.css')}}"/>


<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>

@section('content')
  <div class="image-box" style="position: relative">
      <img  src="{{asset('images/faq1.jpg')}}" width= "100%" height= "250px"> 
  </div>

  <div class="container mt-3">
    <div id="accordion" class="faq-accordion">
      @forelse ($faqs as $item => $value )
        <div class="card mb-4">
          <div class="card-header" ide="hading{{$value->id}}">
            <h5 class="mb-0">
              <a class="faq-link" data-toggle="collapse" data-target="#collapse{{$value->id}}" aria-expanded="true" aria-controls="collapse{{$value->id}}">
                {{$value->question}}
              </a>
            </h5>
          </div>      
          <div id="collapse{{$value->id}}" class="collapse" aria-labelledby="heading{{$value->id}}" data-parent="#accordion">
            <div class="card-body">
              {{$value->answer}}
            </div>
          </div>
        </div>
      @empty
      <h1 class="notfound">No record found</h1>
      @endforelse
    </div>
  </div>
    
@endsection





