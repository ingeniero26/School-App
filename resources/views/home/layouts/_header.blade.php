<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="{{url('home')}}"><span>TEST-</span>APP</a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
    </button>

    <div class="collapse navbar-collapse" id="ftco-nav">
        @php
            $getCategoryHeader = App\Models\CategoryModel::getCategoryMenu();
        @endphp
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active"><a href="{{url('home')}}" class="nav-link">Inicio</a></li>
          @foreach ($getCategoryHeader as $category)
              <li class="nav-item"><a href="{{ url($category->slug) }}"
                 class="nav-link">{{ $category->name }}</a></li>
          @endforeach
          <li class="nav-item"><a href="{{url('about')}}" class="nav-link">Nosotros</a></li>
         <!-- <li class="nav-item"><a href="{{url('course')}}" class="nav-link">Programas</a></li>-->
          <li class="nav-item"><a href="{{url('teacher')}}" class="nav-link">Docentes</a></li>
          <li class="nav-item"><a href="{{url('blog')}}" class="nav-link">Blog</a></li>
          <li class="nav-item"><a href="{{url('/')}}" class="nav-link" target="_blank">Notas</a></li>
          <li class="nav-item"><a href="{{url('contact')}}" class="nav-link">Contacto</a></li>
      </ul>
  </div>
 </div>
 </nav>
 <!-- END nav -->
