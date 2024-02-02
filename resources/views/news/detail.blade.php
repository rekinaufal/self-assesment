@extends('layouts.app')

@section('title', 'News Detail')

@push('style')
    <style>
        .news_detail {
            font-family: 'Arial', sans-serif;
            margin: 20px;
        }

        .news_detail h1 {
            color: #333;
        }

        .news_detail p {
            color: #555;
            line-height: 1.6;
        }

        .news_detail img {
            max-width: 100%;
            height: auto;
            margin-top: 20px;
        }

        .news_detail a {
            color: #007BFF;
        }

        :root {
            scroll-behavior: smooth;
        }

        body {
            color: rgba(var(--color-primary-rgb), 1);
        }

        a {
            color: var(--color-links);
            text-decoration: none;
        }

        a:hover {
            color: var(--color-links-hover);
            text-decoration: none;
        }

        .post-content .firstcharacter {
            float: left;
            font-family: Georgia;
            font-size: 75px;
            line-height: 60px;
            padding-top: 4px;
            padding-right: 8px;
            padding-left: 3px;
        }

        /*--------------------------------------------------------------
                        # Comments
                        --------------------------------------------------------------*/
        .comment {
            /* Font not working in <textarea> for this version of bs */}

.comment .avatar {
  position: relative;
  display: inline-block;
  width: 3rem;
  height: 3rem;
}

.comment .avatar-img,
.comment .avatar-initials,
.comment .avatar-placeholder {
  width: 100%;
  height: 100%;
  border-radius: inherit;
}

.comment .avatar-img {
  display: block;
  -o-object-fit: cover;
  object-fit: cover;
}

.comment .avatar-initials {
  position: absolute;
  top: 0;
  left: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--color-white);
  line-height: 0;
  background-color: rgba(var(--color-black-rgba), 0.1);
}

.comment .avatar-placeholder {
  position: absolute;
  top: 0;
  left: 0;
  background: rgba(var(--color-black-rgba), 0.1) url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'%3e%3cpath fill='%23fff' d='M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z'/%3e%3c/svg%3e") no-repeat center/1.75rem;
}

.comment .avatar-indicator {
  position: absolute;
  right: 0;
  bottom: 0;
  width: 20%;
  height: 20%;
  display: block;
  background-color: rgba(var(--color-black-rgba), 0.1);
  border-radius: 50%;
}

.comment .avatar-group {
  display: inline-flex;
}

.comment .avatar-group .avatar+.avatar {
  margin-left: -0.75rem;
}

.comment .avatar-group .avatar:hover {
  z-index: 1;
}

.comment .avatar-sm,
.comment .avatar-group-sm>.avatar {
  width: 2.125rem;
  height: 2.125rem;
  font-size: 1rem;
}

.comment .avatar-sm .avatar-placeholder,
.comment .avatar-group-sm>.avatar .avatar-placeholder {
  background-size: 1.25rem;
}

.comment .avatar-group-sm>.avatar+.avatar {
  margin-left: -0.53125rem;
}

.comment .avatar-lg,
.comment .avatar-group-lg>.avatar {
  width: 4rem;
  height: 4rem;
  font-size: 1.5rem;
}

.comment .avatar-lg .avatar-placeholder,
.comment .avatar-group-lg>.avatar .avatar-placeholder {
  background-size: 2.25rem;
}

.comment .avatar-group-lg>.avatar+.avatar {
  margin-left: -1rem;
}

.comment .avatar-light .avatar-indicator {
  box-shadow: 0 0 0 2px rgba(var(--color-white-rgba), 0.75);
}

.comment .avatar-group-light>.avatar {
  box-shadow: 0 0 0 2px rgba(var(--color-white-rgba), 0.75);
}

.comment .avatar-dark .avatar-indicator {
  box-shadow: 0 0 0 2px rgba(var(--color-black-rgba), 0.25);
}

.comment .avatar-group-dark>.avatar {
  box-shadow: 0 0 0 2px rgba(var(--color-black-rgba), 0.25);
}

.comment textarea {
  font-family: inherit;
}

.comment .comment-replies-title,
.comment .comment-title {
  text-transform: uppercase;
  color: var(--color-black) !important;
  letter-spacing: 0.1rem;
  font-size: 14px;
  font-weight: 600;
  margin-bottom: 30px;
}

.comment .comment-meta .text-muted,
.comment .reply-meta .text-muted {
  font-family: var(--font-secondary);
  font-size: 12px;
}
    </style>
@endpush

@section('main')
    {{-- <div id="news_detail" class="container-fluid" style="min-height: 70%">
        <h1>{{ $news['title'] ?? '' }}</h1>
        <p>{{ $news['description'] ?? '' }}</p>
        <p>Published on : {{ date('F j, Y', strtotime($news['created_at'] ?? '')) }}</p>
        @if ($news['thumbnail'] != null)
            <img src="{{ asset($news->getThumbnailPath()) }}" alt="Thumbnail">
        @endif 
        <p>{{ $news['description'] ?? '' }}</p>
        <p>Read more: <a href="{{ $news['link'] }}">{{ $news['link'] ?? '' }}</a></p>
    </div> --}}

    <div class="container">
        <div class="row">
            <div class="col-md-12 post-content" data-aos="fade-up">
                <!-- ======= Single Post Content ======= -->
                <div class="single-post">
                    <div class="post-meta mt-2"><span class="date">News Detail</span> <span class="mx-1">&bullet;</span>
                        <span>Published on : {{ date('F j, Y', strtotime($news['created_at'] ?? '')) }}</span>
                    </div>
                    <h1 class="mb-5">{{ $news['title'] ?? '' }}</h1>
                    {!! $news['description'] ?? '' !!}
                    {{-- <span class="firstcharacter"> --}}
                    {{-- </span> --}}
                        {{-- {!! substr($news['description'] ?? '', 1) !!} --}}
                    <figure class="my-4">
                        <img src="{{ asset($news->getThumbnailPath()) }}" alt="" class="img-fluid" width="100%"
                            style="border-radius: 8px; max-height: 700px;">
                        <figcaption>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, odit?
                        </figcaption>
                    </figure>
                    <p><span class="firstcharacter"> S</span>unt reprehenderit, hic vel optio odit est dolore, distinctio
                        iure itaque enim pariatur ducimus.
                        Rerum soluta, perspiciatis voluptatum cupiditate praesentium repellendus quas expedita
                        exercitationem tempora aliquam quaerat in eligendi adipisci harum non omnis reprehenderit quidem
                        beatae modi. Ea fugiat enim libero, ipsam dicta explicabo nihil, tempore, nulla repellendus eos
                        necessitatibus eligendi corporis cum? Eaque harum, eligendi itaque numquam aliquam soluta.</p>
                    <p>Explicabo perspiciatis, laborum provident voluptates illum in nulla consectetur atque quaerat
                        excepturi quisquam, veniam velit ex pariatur quos consequuntur? Excepturi reiciendis
                        perferendis, cupiditate dolorem eos illum amet. Beatae voluptates nemo esse ratione voluptate,
                        nesciunt fugit magnam veritatis voluptas dignissimos doloribus maiores? Aliquam, dolores natus
                        exercitationem corrupti blanditiis, consequuntur nihil nobis sed voluptatibus maiores sunt, illo
                        provident aliquid laborum. Vitae, ut.</p>
                    <p>Reprehenderit aut sed doloribus blanditiis, aspernatur magni? In molestias rem, similique ut esse
                        repudiandae quod recusandae dolores neque earum omnis at, suscipit fuga? Minima qui veniam
                        deserunt quisquam error amet at ratione nesciunt porro quis placeat repudiandae voluptatibus
                        officiis fuga necessitatibus, expedita officia adipisci eaque labore accusamus? Nesciunt
                        repellat illo exercitationem facilis similique quaerat, quis sequi? Praesentium nulla ipsam
                        dolor.</p>
                    <p>Dolorum, incidunt! Adipisci harum itaque maxime dolores doloremque porro eligendi quis, doloribus
                        vel sit rerum sunt obcaecati nam suscipit nulla vitae alias blanditiis aliquam debitis atque
                        illo modi et placeat. Ratione iure eveniet provident. Culpa laboriosam sed ad quia. Corrupti,
                        earum, perferendis dolore cupiditate sint nihil maiores iusto tempora nobis porro itaque est. Ut
                        laborum culpa assumenda pariatur et perferendis?</p>
                    <p>Est soluta veritatis laboriosam, consequuntur temporibus asperiores, fugit id a ullam sed,
                        expedita sequi doloribus fugiat. Odio et necessitatibus enim nam, iste reprehenderit cupiditate
                        omnis ut iure aliquid obcaecati, repellendus nemo provident eveniet tempora minus! Voluptates
                        aut laboriosam, maiores nihil accusantium, a dolorum quaerat tenetur illo eum culpa cum
                        laudantium sunt doloremque modi possimus magni? Perferendis cum repudiandae corrupti porro.</p>
                    <div class="row">
                        <div class="col-lg-6">
                            <figure class="my-4">
                                <img src="{{ asset($news->getThumbnailPath()) }}" alt="" class="img-fluid"
                                    width="100%">
                                <figcaption>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, odit?
                                </figcaption>
                            </figure>
                        </div>
                        <div class="col-lg-6">
                            <p>Quis molestiae, dolorem consequuntur labore perferendis enim accusantium commodi optio, sequi
                                magnam ad consectetur iste omnis! Voluptatibus, quia officia esse necessitatibus magnam
                                tempore
                                reprehenderit quo aspernatur! Assumenda, minus dolorem repellendus corporis corrupti quia
                                temporibus repudiandae in. Sit rem aut, consectetur repudiandae perferendis nemo alias, iure
                                ipsam omnis quam soluta, nobis animi quis aliquam blanditiis at. Dicta nemo vero sequi
                                exercitationem.</p>
                            <p>Architecto ex id at illum aperiam corporis, quidem magnam doloribus non eligendi delectus
                                laborum
                                porro molestiae beatae eveniet dolor odit optio soluta dolores! Eaque odit a nihil
                                recusandae,
                                error repellendus debitis ex autem ab commodi, maiores officiis doloribus provident optio,
                                architecto assumenda! Nihil cum laboriosam eos dolore aliquid perferendis amet doloremque
                                quibusdam odio soluta vero odit, ipsa, quisquam quod nulla.</p>
                        </div>
                    </div>
                    <p>Consequuntur corrupti fugiat quod! Ducimus sequi nemo illo ad necessitatibus amet nobis corporis
                        et quasi. Optio cum neque fuga. Ad excepturi magnam quisquam ex voluptatibus vitae aut nam
                        quidem doloribus, architecto perspiciatis sit consequatur pariatur alias animi expedita quas? Et
                        doloribus voluptatibus perferendis qui fugiat voluptatum autem facere aspernatur quidem quae
                        assumenda iste, sit similique, necessitatibus laborum magni. Ea, dolores!</p>
                    <p>Possimus temporibus rerum illo quia repudiandae provident sed quas atque. Ipsam adipisci
                        accusamus iste optio illo aliquam molestias? Voluptatibus, veniam recusandae facilis nobis
                        perspiciatis rem similique, nisi ad explicabo ipsa voluptatum, inventore molestiae natus
                        adipisci? Fuga delectus quia assumenda totam aspernatur. Nobis hic ea rem, quaerat voluptate
                        vero illum laboriosam omnis aspernatur labore, natus ex iusto ducimus exercitationem a officia.
                    </p>
                </div><!-- End Single Post Content -->

                <!-- ======= Comments ======= -->
                <div class="comments">
                    <h5 class="comment-title py-4">2 Comments</h5>
                    <div class="comment d-flex mb-4">
                        <div class="flex-shrink-0">
                            <div class="avatar avatar-sm rounded-circle">
                                <img class="avatar-img" src="{{ asset('assets/images/users/1-old.jpg') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-2 ms-sm-3">
                            <div class="comment-meta d-flex align-items-baseline ml-1">
                                <h6 class="me-2 ml-2">Jordan Singer</h6>
                                <span class="text-muted ml-2">2d</span>
                            </div>
                            <div class="comment-body ml-2">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Non minima ipsum at amet
                                doloremque qui magni, placeat deserunt pariatur itaque laudantium impedit aliquam
                                eligendi repellendus excepturi quibusdam nobis esse accusantium.
                            </div>

                            <div class="comment-replies bg-light p-3 mt-3 rounded">
                                <h6 class="comment-replies-title mb-4 text-muted text-uppercase">2 replies</h6>

                                <div class="reply d-flex mb-4">
                                    <div class="flex-shrink-0">
                                        <div class="avatar avatar-sm rounded-circle">
                                            <img class="avatar-img" src="{{ asset('assets/images/users/1.png') }}" alt=""
                                                class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-2 ms-sm-3">
                                        <div class="reply-meta d-flex align-items-baseline">
                                            <h6 class="mb-0 me-2 ml-2">Brandon Smith</h6>
                                            <span class="text-muted ml-2">2d</span>
                                        </div>
                                        <div class="reply-body ml-2">
                                            Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                        </div>
                                    </div>
                                </div>
                                <div class="reply d-flex">
                                    <div class="flex-shrink-0">
                                        <div class="avatar avatar-sm rounded-circle">
                                            <img class="avatar-img" src="{{ asset('assets/images/users/2.png') }}" alt=""
                                                class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-2 ms-sm-3">
                                        <div class="reply-meta d-flex align-items-baseline">
                                            <h6 class="mb-0 me-2 ml-2">James Parsons</h6>
                                            <span class="text-muted ml-2">1d</span>
                                        </div>
                                        <div class="reply-body ml-2">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio dolore
                                            sed eos sapiente, praesentium.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment d-flex">
                        <div class="flex-shrink-0">
                            <div class="avatar avatar-sm rounded-circle">
                                <img class="avatar-img" src="{{ asset('assets/images/users/3.png') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                        <div class="flex-shrink-1 ms-2 ms-sm-3">
                            <div class="comment-meta d-flex">
                                <h6 class="me-2 ml-2">Santiago Roberts</h6>
                                <span class="text-muted ml-2">4d</span>
                            </div>
                            <div class="comment-body ml-2">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto laborum in corrupti
                                dolorum, quas delectus nobis porro accusantium molestias sequi.
                            </div>
                        </div>
                    </div>
                </div><!-- End Comments -->

                 <!-- ======= Comments Form ======= -->
            <div class="row justify-content-center mt-5">

                <div class="col-lg-12">
                  <h5 class="comment-title">Leave a Comment</h5>
                  <div class="row">
                    <div class="col-lg-6 mb-3">
                      <label for="comment-name">Name</label>
                      <input type="text" class="form-control" id="comment-name" placeholder="Enter your name">
                    </div>
                    <div class="col-lg-6 mb-3">
                      <label for="comment-email">Email</label>
                      <input type="text" class="form-control" id="comment-email" placeholder="Enter your email">
                    </div>
                    <div class="col-12 mb-3">
                      <label for="comment-message">Message</label>
  
                      <textarea class="form-control" id="comment-message" placeholder="Enter your name" cols="30" rows="10"></textarea>
                        </div>
                        <div class="col-12">
                          <input type="submit" class="btn btn-primary" value="Post comment">
                        </div>
                      </div>
                    </div>
                  </div><!-- End Comments Form -->
@endsection
@push('scripts')
    <script src="{{ asset('assets/extra-libs/sparkline/sparkline.js') }}"></script>
        <script src="{{ asset('library/sweetalert/dist/sweetalert.min.js') }}"></script>
        <script src="{{ asset('dist/js/news/script.js') }}"></script>
@endpush
