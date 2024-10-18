@extends('home.layouts.app')

@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url('public/frontend/images/nt.jpg');">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-center">
        <div class="col-md-9 ftco-animate pb-5 text-center">
         <p class="breadcrumbs"><span class="mr-2"><a href="{{url('home')}}">Inicio <i class="fa fa-chevron-right"></i></a></span> <span>About us <i class="fa fa-chevron-right"></i></span></p>
         <h1 class="mb-0 bread">Nosotros</h1>
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
         <div class="img d-flex align-items-center justify-content-center" style="background-image:url(public/frontendimages/about-1.jpg);">
         </div>
         <div class="img-2 d-flex align-items-center justify-content-center" style="background-image:url(public/frontend/images/about.jpg);">
         </div>
       </div>
     </div>
     <div class="col-md-6 pl-md-5 py-5">
      <div class="row justify-content-start pb-3">
        <div class="col-md-12 heading-section ftco-animate">
         <span class="subheading"></span>
         <h2 class="mb-4">Misión</h2>
         <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
         <p><a href="{{url('contact')}}" class="btn btn-primary">Inscribete</a></p>
       </div>
        <div class="col-md-12 heading-section ftco-animate">
         <span class="subheading"></span>
         <h2 class="mb-4">Visión</h2>
         <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
         <p><a href="{{url('contact')}}" class="btn btn-primary">Inscribete</a></p>
       </div>
     </div>
   </div>
  </div>
  </div>
  </div>
  </div>
  </section>

  <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(public/frontend/images/bg_4.jpg);">
   <div class="overlay"></div>
   <div class="container">
    <div class="row">
     <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
       <div class="block-18 d-flex align-items-center">
        <div class="icon"><span class="flaticon-online"></span></div>
        <div class="text">
         <strong class="number" data-number="400">0</strong>
         <span>Cursos Online</span>
       </div>
     </div>
   </div>
   <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
     <div class="block-18 d-flex align-items-center">
      <div class="icon"><span class="flaticon-graduated"></span></div>
      <div class="text">
       <strong class="number" data-number="4500">0</strong>
       <span>Estudiantes Inscritos</span>
     </div>
   </div>
  </div>
  <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
   <div class="block-18 d-flex align-items-center">
    <div class="icon"><span class="flaticon-instructor"></span></div>
    <div class="text">
     <strong class="number" data-number="1200">0</strong>
     <span>Instructores Expertos</span>
   </div>
  </div>
  </div>
  <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
   <div class="block-18 d-flex align-items-center">
    <div class="icon"><span class="flaticon-tools"></span></div>
    <div class="text">
     <strong class="number" data-number="300">0</strong>
     <span>Horas de Contenido</span>
   </div>
  </div>
  </div>
  </div>
  </div>
  </section>


  <section class="ftco-section testimony-section bg-light">
   <div class="overlay" style="background-image: url(images/bg_2.jpg);"></div>
   <div class="container">
    <div class="row pb-4">
      <div class="col-md-7 heading-section ftco-animate">
       <span class="subheading">Testimonial</span>
       <h2 class="mb-4">Que dicen nuestros estudiantes</h2>
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
              <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <div class="d-flex align-items-center">
               <div class="user-img" style="background-image: url(public/frontend/images/person_1.jpg)"></div>
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
          <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          <div class="d-flex align-items-center">
           <div class="user-img" style="background-image: url(public/frontend/images/person_2.jpg)"></div>
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
      <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
      <div class="d-flex align-items-center">
       <div class="user-img" style="background-image: url(public/frontend/images/person_3.jpg)"></div>
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
      <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
      <div class="d-flex align-items-center">
       <div class="user-img" style="background-image: url(public/frontend/images/person_1.jpg)"></div>
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
      <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
      <div class="d-flex align-items-center">
       <div class="user-img" style="background-image: url(public/frontend/images/person_2.jpg)"></div>
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


@endsection
