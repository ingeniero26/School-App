@extends('home.layouts.app')

@section('style')
@endsection
@section('content')
    <div class="hero-wrap js-fullheight" style="background-image: url('public/frontend/images/banner.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center" data-scrollax-parent="true">
                <div class="col-md-7 ftco-animate">
                    <span class="subheading">Bienvenidos a TEST</span>
                    <h1 class="mb-4">TEST</h1>
                    </p>
                    <p class="mb-0"><a href="{{url('course')}}" class="btn btn-primary">Programas Ofertados</a>
                         <a href="{{url('contact')}}"
                            class="btn btn-white">Contacto</a></p>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section ftco-no-pb ftco-no-pt">
        <div class="container">
            <div class="row">
                <div class="col-md-7"></div>

            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center pb-4">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">Inscribete </span>
                    <h2 class="mb-4">Cursos</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-3 col-lg-2">
                    <a href="#" class="course-category img d-flex align-items-center justify-content-center"
                        style="background-image: url('public/frontend/images/work-1.jpg');">
                        <div class="text w-100 text-center">
                            <h3>Areas Contables</h3>
                            <span>100 course</span>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-lg-2">
                    <a href="#" class="course-category img d-flex align-items-center justify-content-center"
                        style="background-image: url(public/frontend/images/work-9.jpg);">
                        <div class="text w-100 text-center">
                            <h3>Primera Infancia</h3>
                            <span>100 course</span>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-lg-2">
                    <a href="#" class="course-category img d-flex align-items-center justify-content-center"
                        style="background-image: url(public/frontend/images/work-3.jpg);">
                        <div class="text w-100 text-center">
                            <h3>Salud Ocupacional</h3>
                            <span>100 course</span>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-lg-2">
                    <a href="#" class="course-category img d-flex align-items-center justify-content-center"
                        style="background-image: url(public/frontend/images/work-5.jpg);">
                        <div class="text w-100 text-center">
                            <h3>Aux Enfermeria</h3>
                            <span>100 course</span>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-lg-2">
                    <a href="#" class="course-category img d-flex align-items-center justify-content-center"
                        style="background-image: url(public/frontend/images/work-8.jpg);">
                        <div class="text w-100 text-center">
                            <h3>Belleza</h3>
                            <span>100 course</span>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-lg-2">
                    <a href="#" class="course-category img d-flex align-items-center justify-content-center"
                        style="background-image: url(public/frontend/images/work-6.jpg);">
                        <span class="text w-100 text-center">
                            <h3>Maquinaria</h3>
                            <span>100 course</span>
                        </span>
                    </a>
                </div>
                <div class="col-md-12 text-center mt-5">
                    <a href="{{url('contact')}}" class="btn btn-secondary">Inscribete</a>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center pb-4">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">Start Learning Today</span>
                    <h2 class="mb-4">Porgramas/Cursos</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 ftco-animate">
                    <div class="project-wrap">
                        <a href="#" class="img"
                            style="background-image: url(public/frontend/images/c1.jpg);">
                            <span class="price">Aux Contable</span>
                        </a>
                        <div class="text p-4">
                            <h3><a href="#">Administrativo /Contable</a></h3>
                            <p class="advisor">Advisor <span>Tony Garret</span></p>
                            <ul class="d-flex justify-content-between">
                                <li><span class="flaticon-shower"></span>2300</li>
                                <li class="price">$199</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ftco-animate">
                    <div class="project-wrap">
                        <a href="#" class="img"
                            style="background-image: url(public/frontend/images/work-2.jpg);">
                            <span class="price">Software</span>
                        </a>
                        <div class="text p-4">
                            <h3><a href="#">Desarrollo de software</a></h3>
                            <p class="advisor">Advisor <span>Tony Garret</span></p>
                            <ul class="d-flex justify-content-between">
                                <li><span class="flaticon-shower"></span>2300</li>
                                <li class="price">$199</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ftco-animate">
                    <div class="project-wrap">
                        <a href="#" class="img"
                            style="background-image: url(public/frontend/images/c3.jpg);">
                            <span class="price">Mecánica de motos</span>
                        </a>
                        <div class="text p-4">
                            <h3><a href="#">Mantenimiento de motos</a></h3>
                            <p class="advisor">Advisor <span>Tony Garret</span></p>
                            <ul class="d-flex justify-content-between">
                                <li><span class="flaticon-shower"></span>2300</li>
                                <li class="price">$199</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 ftco-animate">
                    <div class="project-wrap">
                        <a href="#" class="img"
                            style="background-image: url(public/frontend/images/c2.jpg);">
                            <span class="price">Salud Ocupasional</span>
                        </a>
                        <div class="text p-4">
                            <h3><a href="#">Auxiliar Salud ocupacional</a></h3>
                            <p class="advisor">Advisor <span>Tony Garret</span></p>
                            <ul class="d-flex justify-content-between">
                                <li><span class="flaticon-shower"></span>2300</li>
                                <li class="price">$199</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ftco-animate">
                    <div class="project-wrap">
                        <a href="#" class="img"
                            style="background-image: url(public/frontend/images/c4.jpg);">
                            <span class="price">Belleza</span>
                        </a>
                        <div class="text p-4">
                            <h3><a href="#">Curso Peluqueria /Barberia</a></h3>
                            <p class="advisor">Advisor <span>Tony Garret</span></p>
                            <ul class="d-flex justify-content-between">
                                <li><span class="flaticon-shower"></span>2300</li>
                                <li class="price">$199</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ftco-animate">
                    <div class="project-wrap">
                        <a href="#" class="img"
                            style="background-image: url(public/frontend/images/c5.jpg);">
                            <span class="price">Area Salud</span>
                        </a>
                        <div class="text p-4">
                            <h3><a href="#">Auxiliar de enfermeria</a></h3>
                            <p class="advisor">Advisor <span>Tony Garret</span></p>
                            <ul class="d-flex justify-content-between">
                                <li><span class="flaticon-shower"></span>2300</li>
                                <li class="price">$199</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-counter img" id="section-counter"
        style="background-image: url(public/frontend/images/bg_4.jpg);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 d-flex align-items-center">
                        <div class="icon"><span class="flaticon-online"></span></div>
                        <div class="text">
                            <strong class="number" data-number="400">0</strong>
                            <span>Online Courses</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 d-flex align-items-center">
                        <div class="icon"><span class="flaticon-graduated"></span></div>
                        <div class="text">
                            <strong class="number" data-number="4500">0</strong>
                            <span>Students Enrolled</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 d-flex align-items-center">
                        <div class="icon"><span class="flaticon-instructor"></span></div>
                        <div class="text">
                            <strong class="number" data-number="1200">0</strong>
                            <span>Experts Instructors</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 d-flex align-items-center">
                        <div class="icon"><span class="flaticon-tools"></span></div>
                        <div class="text">
                            <strong class="number" data-number="300">0</strong>
                            <span>Hours Content</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-about img">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-12 about-intro">
                    <div class="row">
                        <div class="col-md-6 d-flex">
                            <div class="d-flex about-wrap">
                                <div class="img d-flex align-items-center justify-content-center"
                                    style="background-image:url(public/frontend/images/about-1.jpg);">
                                </div>
                                <div class="img-2 d-flex align-items-center justify-content-center"
                                    style="background-image:url(public/frontend/images/about.jpg);">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="ftco-section testimony-section bg-light">
        <div class="overlay" style="background-image: url(public/frontend/images/bg_2.jpg);"></div>
        <div class="container">
            <div class="row pb-4">
                <div class="col-md-7 heading-section ftco-animate">
                    <span class="subheading">Testimonial</span>
                    <h2 class="mb-4">What Are Students Says</h2>
                </div>
            </div>
        </div>
        <div class="container container-2">
            <div class="row ftco-animate">
                <div class="col-md-12">
                    <div class="carousel-testimony owl-carousel">
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="text">
                                    <p class="star">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </p>
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img"
                                            style="background-image: url(public/frontend/images/person_1.jpg)"></div>
                                        <div class="pl-3">
                                            <p class="name">Roger Scott</p>
                                            <span class="position">Marketing Manager</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="text">
                                    <p class="star">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </p>
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img"
                                            style="background-image: url(public/frontend/images/person_2.jpg)"></div>
                                        <div class="pl-3">
                                            <p class="name">Roger Scott</p>
                                            <span class="position">Marketing Manager</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="text">
                                    <p class="star">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </p>
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img"
                                            style="background-image: url(public/frontend/images/person_3.jpg)"></div>
                                        <div class="pl-3">
                                            <p class="name">Roger Scott</p>
                                            <span class="position">Marketing Manager</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="text">
                                    <p class="star">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </p>
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img"
                                            style="background-image: url(public/frontend/images/person_1.jpg)"></div>
                                        <div class="pl-3">
                                            <p class="name">Roger Scott</p>
                                            <span class="position">Marketing Manager</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="text">
                                    <p class="star">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </p>
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img"
                                            style="background-image: url(public/frontend/images/person_2.jpg)"></div>
                                        <div class="pl-3">
                                            <p class="name">Roger Scott</p>
                                            <span class="position">Marketing Manager</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center pb-4">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">Nuestro Blog</span>
                    <h2 class="mb-4">Lo mas reciente</h2>
                </div>
            </div>
            <div class="row d-flex">
                @foreach ($getRecentPosts as $post)
                    <div class="col-lg-4 ftco-animate">
                        <div class="blog-entry">
                            <a href="{{ url('blog/' . $post->slug) }}" class="block-20"
                                style="background-image: url('{{ $post->getImage() }}');">
                            </a>
                            <div class="text d-block">
                                <div class="meta">
                                    <p>
                                        <a href="#"><span class="fa fa-calendar mr-2"></span>{{ $post->created_at->format('M d, Y') }}</a>
                                        <a href="#"><span class="fa fa-user mr-2"></span>{{ $post->created_by_name }}</a>
                                        <a href="#" class="meta-chat"><span class="fa fa-comment mr-2"></span> {{ $post->comments_count }}</a>
                                    </p>
                                </div>
                                <h3 class="heading"><a href="{{ url('blog/' . $post->slug) }}">{{ $post->title }}</a></h3>
                                <p>{!! Str::limit($post->description, 100) !!}</p>
                                <p><a href="{{ url($post->slug) }}" class="btn btn-secondary py-2 px-3">Leer
                                    Más</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection
@section('script')
@endsection
