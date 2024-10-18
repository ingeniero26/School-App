@extends('home.layouts.app')

@section('content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('public/frontend/images/blog.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ url('home') }}">Inicio <i
                                    class="fa fa-chevron-right"></i></a></span> <span> @if(!empty($header_title))
                                        {{$header_title}}
                                        @else
                                        Nuesto Blog
                                        @endif
                                       </h1> <i
                                class="fa fa-chevron-right"></i></span></p>
                    <h1 class="mb-0 bread">
                        @if(!empty($header_title))
                        {{$header_title}}
                        @else
                        Nuesto Blog
                        @endif
                       </h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row d-flex">
                @foreach ($getRecordFront as $post)
                    <div class="col-lg-4 ftco-animate">
                        <div class="blog-entry">
                            <a href="{{ url($post->slug) }}" class="block-20"
                                style="background-image: url('{{ $post->getImage() }}');">
                            </a>
                            <div class="text d-block">
                                <div class="meta">
                                    <p>
                                        <a href="#"><span
                                                class="fa fa-calendar mr-2"></span>{{ $post->created_at->format('M d, Y') }}</a>
                                        <a href="#"><span
                                                class="fa fa-user mr-2"></span>{{ $post->created_by_name }}</a>
                                        <a href="{{ url($post->slug) }}"><span
                                                class="fa fa-folder text-primary ml-1  mr-1">{{ $post->category_name }}</span></a>
                                        <a href="#" class="meta-chat"><span class="fa fa-comment mr-2"></span>
                                            {{ $post->comments_count }}</a>
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

        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    {!! $getRecordFront->links() !!}
                </div>
            </div>
        </div>
    </section>
</section>
@endsection
