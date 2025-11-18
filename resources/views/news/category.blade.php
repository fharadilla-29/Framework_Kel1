@extends('layouts.news')

@section('title', 'Kategori: ' . ucfirst($category))

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
                        <li class="breadcrumb-item active" aria-current="page">{{ ucfirst($category) }}</li>
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
                            <h3>{{ ucfirst($category) }}</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="whats-news-caption">
                            <div class="row">
                                @forelse($news as $item)
                                <div class="col-lg-6 col-md-6">
                                    <div class="single-what-news mb-100">
                                        <div class="what-img">
                                            <img src="{{ asset('aznews/assets/img/news/whatNews1.jpg') }}" alt="">
                                        </div>
                                        <div class="what-cap">
                                            <span class="color1">{{ $item->category }}</span>
                                            <h4><a href="{{ route('news.show', $item->slug) }}">{{ $item->title }}</a></h4>
                                            <p>{{ \Illuminate\Support\Str::limit($item->content, 100) }}</p>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="col-12">
                                    <div class="alert alert-info">
                                        Belum ada berita dalam kategori ini.
                                    </div>
                                </div>
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
                                    {{ $news->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <!-- Section Tittle -->
                <div class="section-tittle mb-40">
                    <h3>Kategori Populer</h3>
                </div>
                
                <!-- Kategori -->
                <div class="single-follow mb-45">
                    <div class="single-box">
                        <div class="follow-us d-flex align-items-center">
                            <div class="follow-social">
                                <a href="{{ route('news.category', 'teknologi') }}">
                                    <img src="{{ asset('aznews/assets/img/news/icon-fb.png') }}" alt="">
                                </a>
                            </div>
                            <div class="follow-count">  
                                <span>Teknologi</span>
                                <p>Berita teknologi terbaru</p>
                            </div>
                        </div> 
                        <div class="follow-us d-flex align-items-center">
                            <div class="follow-social">
                                <a href="{{ route('news.category', 'olahraga') }}">
                                    <img src="{{ asset('aznews/assets/img/news/icon-tw.png') }}" alt="">
                                </a>
                            </div>
                            <div class="follow-count">
                                <span>Olahraga</span>
                                <p>Berita olahraga terkini</p>
                            </div>
                        </div>
                        <div class="follow-us d-flex align-items-center">
                            <div class="follow-social">
                                <a href="{{ route('news.category', 'politik') }}">
                                    <img src="{{ asset('aznews/assets/img/news/icon-ins.png') }}" alt="">
                                </a>
                            </div>
                            <div class="follow-count">
                                <span>Politik</span>
                                <p>Berita politik terbaru</p>
                            </div>
                        </div>
                        <div class="follow-us d-flex align-items-center">
                            <div class="follow-social">
                                <a href="{{ route('news.category', 'kesehatan') }}">
                                    <img src="{{ asset('aznews/assets/img/news/icon-yo.png') }}" alt="">
                                </a>
                            </div>
                            <div class="follow-count">
                                <span>Kesehatan</span>
                                <p>Berita kesehatan terkini</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- New Poster -->
                <div class="news-poster d-none d-lg-block">
                    <img src="{{ asset('aznews/assets/img/news/news_card.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Whats New End -->
@endsection

