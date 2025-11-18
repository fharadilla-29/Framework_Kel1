@extends('layouts.news')

@section('title', 'Portal Berita - Beranda')

@section('content')
<!-- Trending Area Start -->
<div class="trending-area fix">
    <div class="container">
        <div class="trending-main">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Trending Top -->
                    <div class="trending-top mb-30">
                        <div class="trend-top-img">
                            @if($featuredNews->isNotEmpty())
                            <img src="{{ asset('aznews/assets/img/trending/trending_top.jpg') }}" alt="">
                            <div class="trend-top-cap">
                                <span>{{ $featuredNews[0]->category ?? 'Berita Utama' }}</span>
                                <h2><a href="{{ route('news.show', $featuredNews[0]->slug ?? '#') }}">{{ $featuredNews[0]->title ?? 'Berita Utama Terkini' }}</a></h2>
                            </div>
                            @else
                            <img src="{{ asset('aznews/assets/img/trending/trending_top.jpg') }}" alt="">
                            <div class="trend-top-cap">
                                <span>Berita Utama</span>
                                <h2><a href="#">Berita Utama Terkini</a></h2>
                            </div>
                            @endif
                        </div>
                    </div>
                    <!-- Trending Bottom -->
                    <div class="trending-bottom">
                        <div class="row">
                            @forelse($featuredNews->skip(1)->take(3) as $news)
                            <div class="col-lg-4">
                                <div class="single-bottom mb-35">
                                    <div class="trend-bottom-img mb-30">
                                        <img src="{{ asset('aznews/assets/img/trending/trending_bottom1.jpg') }}" alt="">
                                    </div>
                                    <div class="trend-bottom-cap">
                                        <span class="color1">{{ $news->category }}</span>
                                        <h4><a href="{{ route('news.show', $news->slug) }}">{{ $news->title }}</a></h4>
                                    </div>
                                </div>
                            </div>
                            @empty
                            @for($i = 1; $i <= 3; $i++)
                            <div class="col-lg-4">
                                <div class="single-bottom mb-35">
                                    <div class="trend-bottom-img mb-30">
                                        <img src="{{ asset('aznews/assets/img/trending/trending_bottom'.$i.'.jpg') }}" alt="">
                                    </div>
                                    <div class="trend-bottom-cap">
                                        <span class="color{{ $i }}">Kategori</span>
                                        <h4><a href="#">Judul Berita {{ $i }}</a></h4>
                                    </div>
                                </div>
                            </div>
                            @endfor
                            @endforelse
                        </div>
                    </div>
                </div>
                <!-- Right content -->
                <div class="col-lg-4">
                    @forelse($popularNews as $news)
                    <div class="trand-right-single d-flex">
                        <div class="trand-right-img">
                            <img src="{{ asset('aznews/assets/img/trending/right1.jpg') }}" alt="">
                        </div>
                        <div class="trand-right-cap">
                            <span class="color1">{{ $news->category }}</span>
                            <h4><a href="{{ route('news.show', $news->slug) }}">{{ $news->title }}</a></h4>
                        </div>
                    </div>
                    @empty
                    @for($i = 1; $i <= 4; $i++)
                    <div class="trand-right-single d-flex">
                        <div class="trand-right-img">
                            <img src="{{ asset('aznews/assets/img/trending/right'.$i.'.jpg') }}" alt="">
                        </div>
                        <div class="trand-right-cap">
                            <span class="color{{ $i }}">Kategori</span>
                            <h4><a href="#">Judul Berita Populer {{ $i }}</a></h4>
                        </div>
                    </div>
                    @endfor
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Trending Area End -->

<!-- Whats New Start -->
<section class="whats-news-area pt-50 pb-20">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row d-flex justify-content-between">
                    <div class="col-lg-3 col-md-3">
                        <div class="section-tittle mb-30">
                            <h3>Berita Terbaru</h3>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="properties__button">
                            <!--Nav Button  -->                                            
                            <nav>                                                                     
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Semua</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Teknologi</a>
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Olahraga</a>
                                    <a class="nav-item nav-link" id="nav-last-tab" data-toggle="tab" href="#nav-last" role="tab" aria-controls="nav-contact" aria-selected="false">Politik</a>
                                    <a class="nav-item nav-link" id="nav-Sports" data-toggle="tab" href="#nav-nav-Sport" role="tab" aria-controls="nav-contact" aria-selected="false">Kesehatan</a>
                                </div>
                            </nav>
                            <!--End Nav Button  -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <!-- Nav Card -->
                        <div class="tab-content" id="nav-tabContent">
                            <!-- card one -->
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">           
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
                                                    <h4><a href="#">Judul Berita Terbaru {{ $i }}</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                        @endfor
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                            <!-- Card two -->
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <div class="whats-news-caption">
                                    <div class="row">
                                        @for($i = 1; $i <= 4; $i++)
                                        <div class="col-lg-6 col-md-6">
                                            <div class="single-what-news mb-100">
                                                <div class="what-img">
                                                    <img src="{{ asset('aznews/assets/img/news/whatNews'.(($i % 2) + 1).'.jpg') }}" alt="">
                                                </div>
                                                <div class="what-cap">
                                                    <span class="color1">Teknologi</span>
                                                    <h4><a href="#">Berita Teknologi {{ $i }}</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            <!-- Card three -->
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <div class="whats-news-caption">
                                    <div class="row">
                                        @for($i = 1; $i <= 4; $i++)
                                        <div class="col-lg-6 col-md-6">
                                            <div class="single-what-news mb-100">
                                                <div class="what-img">
                                                    <img src="{{ asset('aznews/assets/img/news/whatNews'.(($i % 2) + 1).'.jpg') }}" alt="">
                                                </div>
                                                <div class="what-cap">
                                                    <span class="color1">Olahraga</span>
                                                    <h4><a href="#">Berita Olahraga {{ $i }}</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            <!-- card four -->
                            <div class="tab-pane fade" id="nav-last" role="tabpanel" aria-labelledby="nav-last-tab">
                                <div class="whats-news-caption">
                                    <div class="row">
                                        @for($i = 1; $i <= 4; $i++)
                                        <div class="col-lg-6 col-md-6">
                                            <div class="single-what-news mb-100">
                                                <div class="what-img">
                                                    <img src="{{ asset('aznews/assets/img/news/whatNews'.(($i % 2) + 1).'.jpg') }}" alt="">
                                                </div>
                                                <div class="what-cap">
                                                    <span class="color1">Politik</span>
                                                    <h4><a href="#">Berita Politik {{ $i }}</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            <!-- card Five -->
                            <div class="tab-pane fade" id="nav-nav-Sport" role="tabpanel" aria-labelledby="nav-Sports">
                                <div class="whats-news-caption">
                                    <div class="row">
                                        @for($i = 1; $i <= 4; $i++)
                                        <div class="col-lg-6 col-md-6">
                                            <div class="single-what-news mb-100">
                                                <div class="what-img">
                                                    <img src="{{ asset('aznews/assets/img/news/whatNews'.(($i % 2) + 1).'.jpg') }}" alt="">
                                                </div>
                                                <div class="what-cap">
                                                    <span class="color1">Kesehatan</span>
                                                    <h4><a href="#">Berita Kesehatan {{ $i }}</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Nav Card -->
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <!-- Section Tittle -->
                <div class="section-tittle mb-40">
                    <h3>Follow Us</h3>
                </div>
                <!-- Flow Socail -->
                <div class="single-follow mb-45">
                    <div class="single-box">
                        <div class="follow-us d-flex align-items-center">
                            <div class="follow-social">
                                <a href="#"><img src="{{ asset('aznews/assets/img/news/icon-fb.png') }}" alt=""></a>
                            </div>
                            <div class="follow-count">  
                                <span>8,045</span>
                                <p>Fans</p>
                            </div>
                        </div> 
                        <div class="follow-us d-flex align-items-center">
                            <div class="follow-social">
                                <a href="#"><img src="{{ asset('aznews/assets/img/news/icon-tw.png') }}" alt=""></a>
                            </div>
                            <div class="follow-count">
                                <span>8,045</span>
                                <p>Followers</p>
                            </div>
                        </div>
                        <div class="follow-us d-flex align-items-center">
                            <div class="follow-social">
                                <a href="#"><img src="{{ asset('aznews/assets/img/news/icon-ins.png') }}" alt=""></a>
                            </div>
                            <div class="follow-count">
                                <span>8,045</span>
                                <p>Followers</p>
                            </div>
                        </div>
                        <div class="follow-us d-flex align-items-center">
                            <div class="follow-social">
                                <a href="#"><img src="{{ asset('aznews/assets/img/news/icon-yo.png') }}" alt=""></a>
                            </div>
                            <div class="follow-count">
                                <span>8,045</span>
                                <p>Subscribers</p>
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

