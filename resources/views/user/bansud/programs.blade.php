@if($data->isEmpty())
<div></div>
@else
<div class="page-section" id="programs">
    <div class="container">
      <h1 class="text-center mb-5 wow fadeInUp text-uppercase" style="font-size: 50px; font-family:'Segoe UI Black';">Upcoming Events</h1>

      <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
        @foreach($data as $event)
        <div class="item">
          <div class="card-doctor" style="height:360px;position:relative;">
            <div class="header" style="border: solid white;">
              <img src="eventimage/{{$event->photo}}" alt="" style="height: 200px;">
            </div>
            <div class="body">
              <p class="text-xl mb-0">{{$event->name}}</p>
              <span class="text-sm2 text-black"> {{$event->location}} </span>
            </div>
            <div class="p-3">
              <a style="position: absolute; left:70px; bottom:30px; background-color: green " href="{{url('view-bansud-event', $event->id)}}" class="btn btn-primary">View Event</a>
            </div>
          </div>
        </div>
        @endforeach
        
      </div>
    </div>
  </div> 
  @endif