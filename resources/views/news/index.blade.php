@extends('layouts.news')

@section('title', 'Portal Berita - Daftar Berita')

@section('content')
<!-- Breadcrumb Start -->
<div class="page-notification">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="{{ route('news.home') }}">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Berita</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Whats New Start -->
<section class="whats-news-area pt-50 pb-20">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row d-flex justify-content-between">
                    <div class="col-lg-3 col-md-3">
                        <div class="section-tittle mb-30">
                            <h3>Daftar Berita</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="whats-news-caption">
                            <div class="row">
                                @forelse($latestNews as $news)
                                <div class="col-lg-6 col-md-6">
                                    <div class="single-what-news mb-100">
                                        <div class="what-img">
                                            <img src="{{ asset('aznews/assets/img/news/whatNews1.jpg') }}" alt="">
                                        </div>
                                        <div class="what-cap">
                                            <span class="color1">{{ $news->category }}</span>
                                            <h4><a href="{{ route('news.show', $news->slug) }}">{{ $news->title }}</a></h4>
                                            <p>{{ \Illuminate\Support\Str::limit($news->content, 100) }}</p>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                @for($i = 1; $i <= 6; $i++)
                                <div class="col-lg-6 col-md-6">
                                    <div class="single-what-news mb-100">
                                        <div class="what-img">
                                            <img src="{{ asset('aznews/assets/img/news/whatNews'.(($i % 2) + 1).'.jpg') }}" alt="">
                                        </div>
                                        <div class="what-cap">
                                            <span class="color{{ ($i % 3) + 1 }}">Kategori</span>
                                            <h4><a href="#">Judul Berita {{ $i }}</a></h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</p>
                                        </div>
                                    </div>
                                </div>
                                @endfor
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Pagination -->
                <div class="pagination-area pb-45 text-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="single-wrap d-flex justify-content-center">
                                    {{ $latestNews->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <!-- Section Tittle -->
                <div class="section-tittle mb-40">
                    <h3>Berita Unggulan</h3>
                </div>
                
                <!-- Berita Unggulan -->
                @forelse($featuredNews as $news)
                <div class="trand-right-single d-flex mb-20">
                    <div class="trand-right-img">
                        <img src="{{ asset('aznews/assets/img/trending/right1.jpg') }}" alt="">
                    </div>
                    <div class="trand-right-cap">
                        <span class="color1">{{ $news->category }}</span>
                        <h4><a href="{{ route('news.show', $news->slug) }}">{{ $news->title }}</a></h4>
                    </div>
                </div>
                @empty
                @for($i = 1; $i <= 5; $i++)
                <div class="trand-right-single d-flex mb-20">
                    <div class="trand-right-img">
                        <img src="{{ asset('aznews/assets/img/trending/right'.(($i % 4) + 1).'.jpg') }}" alt="">
                    </div>
                    <div class="trand-right-cap">
                        <span class="color{{ ($i % 3) + 1 }}">Kategori</span>
                        <h4><a href="#">Judul Berita Unggulan {{ $i }}</a></h4>
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
</section>
<!-- Whats New End -->
@endsection

