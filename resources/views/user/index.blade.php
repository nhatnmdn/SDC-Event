@extends('master.layout')
@section('title','Index')
@section('content')
    @if(isset($events))
        @foreach($events as $item)
            <div id="1" class="event col-lg-4" id="Developer" data-aos="fade-right" data-aos-delay="100"
                 style="background-color:#1972D4;">
                <div class="text-box">
                    <div class="img">
                        <img src="{{pare_url_file($item->image)}}" alt="" style="height: 300px">
                    </div>
                    <h3>{{$item->name}}</h3>
                    <p>{!! $item->intro !!}</p>
                    <a href="{{route('event.detail',$item->id)}}"><p style="background-color: #EF5656;">{{ __('Read more') }} &rarr;</p></a>
                </div>
            </div>
        @endforeach
    @endif

@endsection

