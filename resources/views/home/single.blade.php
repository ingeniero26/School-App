@extends('home.layouts.app')

@section('content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('public/frontend/images/bg_2.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ url('home') }}">Home <i
                                    class="fa fa-chevron-right"></i></a></span> <span class="mr-2"><a
                                href="index.html">Blog <i class="fa fa-chevron-right"></i></a></span> <span>Blog Single <i
                                class="fa fa-chevron-right"></i></span></p>
                    <h1 class="mb-0 bread">Nuestro Blog</h1>
                </div>
            </div>
        </div>
    </section>


    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 ftco-animate py-md-5 mt-md-5">
                    <h2 class="mb-3">{{ $getRecord->title }}</h2>
                    <p>{!! Str::limit($getRecord->description, 200) !!}</p>
                    <p>
                        @if(!empty($getRecord->getImage()))
                        <img src="{{ $getRecord->getImage() }}" style="max-height: 574px; object-fit:cover;" alt="" class="img-fluid">
                    </p>
                    @endif
                    <a href=""><span class="fa fa-user mr-2"></span>{{ $getRecord->created_by_name }}</a>
                    <a href=""><span
                            class="fa fa-folder text-primary ml-1  mr-1">{{ $getRecord->category_name }}</span></a>
                    <a href="#" class="meta-chat"><span class="fa fa-comment mr-2"></span></a>

                    <div class="pt-5 mt-5">
                        <h3 class="mb-5" style="font-size: 20px; font-weight: bold;">6 Comments</h3>
                        <ul class="comment-list">
                            <li class="comment">
                                <div class="vcard bio">
                                    <img src="{{ url('public/frontend/images/person_1.jpg') }}" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                    <h3>John Doe</h3>
                                    <div class="meta">September 17, 2020 at 2:21pm</div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum
                                        necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente
                                        iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                    <p><a href="#" class="reply">Reply</a></p>
                                </div>
                            </li>

                            <li class="comment">
                                <div class="vcard bio">
                                    <img src="{{ url('public/frontend/images/person_1.jpg') }}" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                    <h3>John Doe</h3>
                                    <div class="meta">September 17, 2020 at 2:21pm</div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum
                                        necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente
                                        iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                    <p><a href="#" class="reply">Reply</a></p>
                                </div>

                                <ul class="children">
                                    <li class="comment">
                                        <div class="vcard bio">
                                            <img src="{{ url('public/frontend/images/person_1.jpg') }}"
                                                alt="Image placeholder">
                                        </div>
                                        <div class="comment-body">
                                            <h3>John Doe</h3>
                                            <div class="meta">September 17, 2020 at 2:21pm</div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem
                                                laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe
                                                enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?
                                            </p>
                                            <p><a href="#" class="reply">Reply</a></p>
                                        </div>


                                        <ul class="children">
                                            <li class="comment">
                                                <div class="vcard bio">
                                                    <img src="{{ url('public/frontend/images/person_1.jpg') }}"
                                                        alt="Image placeholder">
                                                </div>
                                                <div class="comment-body">
                                                    <h3>John Doe</h3>
                                                    <div class="meta">September 17, 2020 at 2:21pm</div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur
                                                        quidem laborum necessitatibus, ipsam impedit vitae autem, eum
                                                        officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum
                                                        impedit necessitatibus, nihil?</p>
                                                    <p><a href="#" class="reply">Reply</a></p>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li class="comment">
                                <div class="vcard bio">
                                    <img src="images/person_1.jpg" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                    <h3>John Doe</h3>
                                    <div class="meta">September 17, 2020 at 2:21pm</div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum
                                        necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente
                                        iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                    <p><a href="#" class="reply">Reply</a></p>
                                </div>
                            </li>
                        </ul>
                        <!-- END comment-list -->

                        <div class="comment-form-wrap pt-5">
                            <h3 class="mb-5" style="font-size: 20px; font-weight: bold;">Leave a comment</h3>
                            <form  class="p-5 bg-light" method="POST" action="{{url('post-comment')}}">
                                {{ @csrf_field() }}
                                <input type="hidden" name="blog_id" value="{{$getRecord->id}}">
                                {{-- <div class="form-group">
                                    <label for="name">Name *</label>
                                    <input type="text" class="form-control" id="name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email *</label>
                                    <input type="email" class="form-control" id="email">
                                </div>
                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input type="url" class="form-control" id="website">
                                </div> --}}

                                <div class="form-group">
                                    <label for="comment">Mensaje</label>
                                    <textarea name="comment" id="message" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Comentar" class="btn py-3 px-4 btn-primary">
                                </div>

                            </form>
                        </div>
                    </div>

                </div> <!-- .col-md-8 -->
                <div class="col-lg-4 sidebar ftco-animate pl-md-4 py-md-5">
                    <div class="sidebar-box mt-md-5 bg-light">
                        <form action="{{url('blog')}}" method="GET" class="search-form">
                            <div class="form-group">
                                <button class="icon fa fa-search"></button>
                                <input type="text" name="q" class="form-control"
                                 placeholder="Search...">
                            </div>
                        </form>
                    </div>
                    <div class="sidebar-box ftco-animate">
                        <div class="categories">
                            <h3>Categorias</h3>
                            @foreach ($getCategory as $category)
                                <li><a href="#">{{ $category->name }} <span>({{ $category->totalBlog() }})</span></a></li>
                            @endforeach

                        </div>
                    </div>

                    <div class="sidebar-box ftco-animate">
                        <h3>Recent Blog</h3>
                        @foreach ($getRecentPosts as $recentPost)
                            <div class="block-21 mb-4 d-flex">
                                <a class="blog-img mr-4" style="background-image: url('{{ $recentPost->getImage() }}');"></a>
                                <div class="text">
                                    <h3 class="heading"><a href="{{ url($recentPost->slug) }}">{{ $recentPost->title }}</a></h3>
                                    <div class="meta">
                                        <div><a href="#"><span class="fa fa-calendar"></span> {{ $recentPost->created_at->format('M d, Y') }}</a></div>
                                        <div><a href="#"><span class="fa fa-user"></span> {{ $recentPost->created_by_name }}</a></div>
                                        <div><a href="#"><span class="fa fa-comment"></span> {{ $recentPost->comments_count }}</a></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                    @if(!empty($getRecord->getTags->count()))
                    <div class="sidebar-box ftco-animate">
                        <h3>Tag Cloud</h3>
                        <div class="tagcloud">
                            @foreach ($getRecord->getTags as $tag)
                                <a href="" class="tag-cloud-link">{{ $tag->name }}</a>
                            @endforeach

                        </div>
                    </div>
                    @endif

                </div>

            </div>
        </div>
    </section> <!-- .section -->
@endsection
