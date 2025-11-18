@extends('layouts.news')

@section('title', $news->title ?? 'Detail Berita')

@section('content')
<!-- Breadcrumb Start -->
<div class="page-notification">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="{{ route('news.home') }}">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('news.index') }}">Berita</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $news->title ?? 'Detail Berita' }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- About US Start -->
<div class="about-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- Trending Tittle -->
                <div class="about-right mb-90">
                    <div class="about-img">
                        <img src="{{ asset('aznews/assets/img/trending/trending_top.jpg') }}" alt="">
                    </div>
                    <div class="section-tittle mb-30 pt-30">
                        <h3>{{ $news->title ?? 'Judul Berita' }}</h3>
                    </div>
                    <div class="about-prea">
                        <p class="about-pera1 mb-25">
                            {!! $news->content ?? 'Konten berita belum tersedia.' !!}
                        </p>
                    </div>
                    
                    <div class="social-share pt-30">
                        <div class="section-tittle">
                            <h3 class="mr-20">Bagikan:</h3>
                            <ul>
                                <li><a href="#"><img src="{{ asset('aznews/assets/img/news/icon-fb.png') }}" alt=""></a></li>
                                <li><a href="#"><img src="{{ asset('aznews/assets/img/news/icon-ins.png') }}" alt=""></a></li>
                                <li><a href="#"><img src="{{ asset('aznews/assets/img/news/icon-tw.png') }}" alt=""></a></li>
                                <li><a href="#"><img src="{{ asset('aznews/assets/img/news/icon-yo.png') }}" alt=""></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <!-- From -->
                <div class="row">
                    <div class="col-lg-8">
                        <form class="form-contact contact_form mb-80" action="#" method="post">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100 error" name="message" id="message" cols="30" rows="9" placeholder="Tulis Komentar"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control error" name="name" id="name" type="text" placeholder="Nama">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control error" name="email" id="email" type="email" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="button button-contactForm boxed-btn">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <!-- Section Tittle -->
                <div class="section-tittle mb-40">
                    <h3>Berita Terkait</h3>
                </div>
                
                <!-- Berita Terkait -->
                @forelse($relatedNews as $related)
                <div class="trand-right-single d-flex mb-20">
                    <div class="trand-right-img">
                        <img src="{{ asset('aznews/assets/img/trending/right1.jpg') }}" alt="">
                    </div>
                    <div class="trand-right-cap">
                        <span class="color1">{{ $related->category }}</span>
                        <h4><a href="{{ route('news.show', $related->slug) }}">{{ $related->title }}</a></h4>
                    </div>
                </div>
                @empty
                @for($i = 1; $i <= 3; $i++)
                <div class="trand-right-single d-flex mb-20">
                    <div class="trand-right-img">
                        <img src="{{ asset('aznews/assets/img/trending/right'.(($i % 4) + 1).'.jpg') }}" alt="">
                    </div>
                    <div class="trand-right-cap">
                        <span class="color{{ ($i % 3) + 1 }}">Kategori</span>
                        <h4><a href="#">Judul Berita Terkait {{ $i }}</a></h4>
                    </div>
                </div>
                @endfor
                @endforelse
                
                <!-- New Poster -->
                <div class="news-poster d-none d-lg-block mt-40">
                    <img src="{{ asset('aznews/assets/img/news/news_card.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About US End -->
@endsection

