<div class="footer-area bg-dark text-gray">
    <!-- aside -->
    <aside class="aside container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-3 col">
                <div class="logo"><a href="home.html"><img src=" {{ asset('images/Asset 2@2x-8.png') }} " alt="CTI"></a>
                </div>
                <p>California Training Institute (CTI) is a digital skills training institute that supports
                    Ethiopians to develop their digital skills through resources, tools, and technology.</p>
                <a href="#" class="btn btn-default text-uppercase">Start Leaning Now</a>
            </div>


            <div class="col-xs-12 col-sm-6 col-md-3 col hidden-xs">
                <h3>Popular Courses</h3>

                <!-- widget cources list -->
                <ul class="widget-cources-list list-unstyled">
                    @foreach($courses as $course)
                    @if($loop->iteration <= 3) <li>
                        <a href="/course_single/{{$course->id}}">
                            <div class="alignleft">
                                <img src="{{ asset('course_resources/'.$course->course_image) }}"
                                    alt="image description" style="object-fit: cover; height: 40px">
                            </div>
                            <div class="description-wrap">
                                <h4>{{$course->course_name}}</h4>
                                <strong
                                    class="price text-primary element-block font-lato text-uppercase">{{$course->course_price}}
                                    ETB</strong>
                            </div>
                        </a>
                        </li>
                        @else
                        @break
                        @endif
                        @endforeach

                </ul>
            </div>
            <nav class="col-xs-12 col-sm-6 col-md-3 col">
                <h3>Quick Links</h3>
                <!-- fooer navigation -->
                <ul class="fooer-navigation list-unstyled">
                    <li><a href="#">All Courses</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms of Use</a></li>
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </nav>
            <div class="col-xs-12 col-sm-6 col-md-3 col">
                <h3>contact us</h3>
                <p>If you want to contact us about any issue our support available to help you 8am-7pm
                    Monday to saturday.</p>
                <!-- ft address -->
                <address class="ft-address">
                    <dl>
                        <dt><span class="fas fa-map-marker"><span class="sr-only">marker</span></span></dt>
                        <dd>Address: Bole Japan Next to Diamond Hotel</dd>
                        <dt><span class="fas fa-phone-square"><span class="sr-only">phone</span></span></dt>
                        <dd>Call: <a href="tel:+2156237532">+251 929 737373</a></dd>
                        <dt><span class="fas fa-envelope-square"><span class="sr-only">email</span></span>
                        </dt>
                        <dd>Email: <a href="mailto:info@Studylms.com">info@edu-cti.com;</a></dd>
                    </dl>
                </address>
            </div>
        </div>
    </aside>
    <!-- page footer -->
    <footer id="page-footer" class="font-lato">
        <div class="container">
            <div class="row holder">
                <div class="col-xs-12 col-sm-push-6 col-sm-6">
                    <ul class="socail-networks list-unstyled">
                        <li><a href="#"><span class="fab fa-facebook"></span></a></li>
                        <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                        <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                        <li><a href="#"><span class="fab fa-linkedin"></span></a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-pull-6 col-sm-6">
                    <p><a href="#">CTI</a> | &copy; 2023 <a href="#">Digital Addis</a>, All rights reserved
                    </p>
                </div>
            </div>
        </div>
    </footer>
</div>