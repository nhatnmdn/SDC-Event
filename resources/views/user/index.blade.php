@extends('master.layout')
@section('title','Index')
@section('content')
    @if($events->count() == 1)
        @foreach($events as $item)
            <div id="1" class="event col-lg-12" id="Developer" data-aos="fade-right" data-aos-delay="100"
                 style="background-color:#1972D4;">
                <div class="text-box">
                    <div class="img">
                        <img src="{{pare_url_file($item->image)}}" alt="" style="height: 300px">
                    </div>
                    <h3>{{$item->name}}</h3>
                    <p>{!! $item->intro !!}</p>
                    <a href="{{route('event.detail',$item->id)}}"><p style="background-color: #EF5656;">Read more &rarr;</p></a>
                </div>
            </div>
        @endforeach
    @else
        @if($events->count() == 2)
            @foreach($events as $item)
                <div id="1" class="event col-lg-6" id="Developer" data-aos="fade-right" data-aos-delay="100"
                     style="background-color:#1972D4;">
                    <div class="text-box">
                        <div class="img">
                            <img src="{{pare_url_file($item->image)}}" alt="" style="height: 300px">
                        </div>
                        <h3>{{$item->name}}</h3>
                        <p>{!! $item->intro !!}</p>
                        <a href="{{route('event.detail',$item->id)}}"><p style="background-color: #EF5656;">Read more &rarr;</p></a>
                    </div>
                </div>
            @endforeach
        @else
            @if($events->count() == 3)
                @foreach($events as $item)
                    <div id="1" class="event col-lg-4" id="Developer" data-aos="fade-right" data-aos-delay="100"
                         style="background-color:#1972D4;">
                        <div class="text-box">
                            <div class="img">
                                <img src="{{pare_url_file($item->image)}}" alt="" style="height: 300px">
                            </div>
                            <h3>{{$item->name}}</h3>
                            <p>{!! $item->intro !!}</p>
                            <a href="{{route('event.detail',$item->id)}}"><p style="background-color: #EF5656;">Read more &rarr;</p></a>
                        </div>
                    </div>
                @endforeach
            @endif
        @endif
    @endif
@endsection

