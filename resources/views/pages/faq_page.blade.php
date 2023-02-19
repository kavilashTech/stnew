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
        <div class="card mb-4">
          <div class="card-header" ide="hadingOne">
            <h5 class="mb-0">
              <a class="faq-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                What is Lorem Ipsum?
              </a>
            </h5>
          </div>      
          <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
            </div>
          </div>
        </div>
        <div class="card mb-4">
          <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
              <button class="faq-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Why do we use Lorem Ipsum?
              </button>
            </h5>
          </div>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">
                Lorem Ipsum is used as placeholder text when designing layouts or creating mockups. It allows designers to focus on the visual elements of a design without being distracted by the content. Lorem Ipsum is used as placeholder text when designing layouts or creating mockups. It allows designers to focus on the visual elements of a design without being distracted by the content.Lorem Ipsum is used as placeholder text when designing layouts or creating mockups. It allows designers to focus on the visual elements of a design without being distracted by the content. Lorem Ipsum is used as placeholder text when designing layouts or creating mockups. It allows designers to focus on the visual elements of a design without being distracted by the content. Lorem Ipsum is used as placeholder text when designing layouts or creating mockups. It allows designers to focus on the visual elements of a design without being distracted by the content.
            </div>
          </div>
        </div>
        <div class="card mb-4">
          <div class="card-header" id="headingThree">
            <h5 class="mb-0">
              <button class="faq-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Where does Lorem Ipsum come from?
              </button>
            </h5>
          </div>
          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
            <div class="card-body">
                Lorem Ipsum is derived from a Latin text by Cicero, written in 45 BC. The text was popularized in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages. Lorem Ipsum is derived from a Latin text by Cicero, written in 45 BC. The text was popularized in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages. Lorem Ipsum is derived from a Latin text by Cicero, written in 45 BC. The text was popularized in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.Lorem Ipsum is derived from a Latin text by Cicero, written in 45 BC. The text was popularized in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.Lorem Ipsum is derived from a Latin text by Cicero, written in 45 BC. The text was popularized in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.Lorem Ipsum is derived from a Latin text by Cicero, written in 45 BC. The text was popularized in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.
            </div>
          </div>
        </div>
        <div class="card mb-4">
          <div class="card-header" id="headingFour">
            <h5 class="mb-0">
              <button class="faq-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                Where does Lorem Ipsum come from?
              </button>
            </h5>
          </div>
          <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
            <div class="card-body">
                Lorem Ipsum is derived from a Latin text by Cicero, written in 45 BC. The text was popularized in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages. Lorem Ipsum is derived from a Latin text by Cicero, written in 45 BC. The text was popularized in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages. Lorem Ipsum is derived from a Latin text by Cicero, written in 45 BC. The text was popularized in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.Lorem Ipsum is derived from a Latin text by Cicero, written in 45 BC. The text was popularized in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.Lorem Ipsum is derived from a Latin text by Cicero, written in 45 BC. The text was popularized in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.Lorem Ipsum is derived from a Latin text by Cicero, written in 45 BC. The text was popularized in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.
            </div>
          </div>
        </div>
        <div class="card mb-4">
          <div class="card-header" id="headingFive">
            <h5 class="mb-0">
              <button class="faq-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                Where does Lorem Ipsum come from?
              </button>
            </h5>
          </div>
          <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
            <div class="card-body">
                Lorem Ipsum is derived from a Latin text by Cicero, written in 45 BC. The text was popularized in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages. Lorem Ipsum is derived from a Latin text by Cicero, written in 45 BC. The text was popularized in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages. Lorem Ipsum is derived from a Latin text by Cicero, written in 45 BC. The text was popularized in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.Lorem Ipsum is derived from a Latin text by Cicero, written in 45 BC. The text was popularized in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.Lorem Ipsum is derived from a Latin text by Cicero, written in 45 BC. The text was popularized in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.Lorem Ipsum is derived from a Latin text by Cicero, written in 45 BC. The text was popularized in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection





