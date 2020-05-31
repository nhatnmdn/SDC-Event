@extends('master.layout')
@section('title','Index')
@section('content')
    <div id="1" class="event col-lg-4" id="Developer" data-aos="fade-right" data-aos-delay="100" style="background-color:#1972D4;">
        <div class="text-box">
            <div class="img">
                <img src="{{asset("user/img/hero-img.png")}}" alt="">
            </div>
            <h3>SOFTWARE DEVELOPMENT</h3>
            <p>In today’s dynamic and fast changing world, every business wishes to stay ahead or at least at par with its competitors. This is possible only if the businesses have right strategies
                and systems in place. Customized software applications automates and streamlines the processes in an organization, thus saving a huge amount of time and costs while increasing
                efficiency.</p>
            <a href=""><p style="background-color: #EF5656;">Read more &rarr;</p></a>
        </div>
    </div>
    <div id="2" class="event col-lg-4" id="Education" data-aos="fade-right" data-aos-delay="100" style="background-color:#23A6D5 ;">
        <div class="text-box">
            <div class="img">
                <img src="{{asset("user/img/hero-img.png")}}" class="img-fluid" alt="">
            </div>
            <h3>EDUCATION</h3>
            <p>MSITA, the first Microsoft IT Academy of Vietnam, was estalished in 2016 according to the comprehensive development cooperation agreement between Mr. Vu Minh Tri, General Director of
                Microsoft Vietnam and the President of Danang University, Prof. Dr. Tran Van Nam. It’s aims are not only to provide learners with the tools and professional skills needed to succeed in
                their careers and to integrate into the international working environment but to provide them with job opportunities after completing the courses. The courses MSITA offering include:
                Programming; Marketing; Graphics design; and Information Technology.</p>
            <a href=""><p style="background-color: #9BD637;">Read more &rarr;</p></a>
        </div>
    </div>
    <div id="3" class="event col-lg-4" id="Business" data-aos="fade-right" data-aos-delay="100" style="background-color:#074B6D ;">
        <div class="text-box">
            <div class="img">
                <img src="{{asset("user/img/hero-img.png")}}" class="img-fluid" alt="">
            </div>
            <h3>BUSINESS ACADEMY</h3>
            <p>Academy of Business- University of Danang (ABIZ), a unit of Software Development Center- University of Danang (SDC) was established with the purpose of providing high-quality business
                training programs in the digital transformation of industry. These courses not only equip employers and employees with sufficient knowledge and advanced skills to apply in practice,
                but build an ecosystem in which learners build a community to connect and develop their careers and business. The main courses include: Data Science; Tools for business digital
                transformation; Techonology 4.0; BIM-REVIT; Microsoft Office Specialist (MOS). Besides we also provide BIM outsourcing services for construction companies in Vietnam and other
                countries.</p>
            <a href=""><p style="background-color: #FFB657;">Read more &rarr;</p></a>
        </div>
    </div>
@endsection

