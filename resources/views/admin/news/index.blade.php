@extends('admin.layouts.master')

@section('title', 'Manajemen Berita')

@section('page-title', 'Manajemen Berita')

@section('breadcrumbs')
<li>Berita</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card height-auto">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>Daftar Berita</h3>
                    </div>
                    <div class="dropdown">
                        <a href="{{ route('admin.news.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Berita</a>
                    </div>
                </div>
                
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                
                <div class="table-responsive">
                    <table class="table display data-table text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Penulis</th>
                                <th>Unggulan</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($news as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->category }}</td>
                                <td>{{ $item->author ?? 'Admin' }}</td>
                                <td>
                                    @if($item->is_featured)
                                    <span class="badge badge-success">Ya</span>
                                    @else
                                    <span class="badge badge-light">Tidak</span>
                                    @endif
                                </td>
                                <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <span class="flaticon-more-button-of-three-dots"></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{ route('news.show', $item->slug) }}" target="_blank">
                                                <i class="fas fa-eye text-dark-pastel-green"></i>Lihat
                                            </a>
                                            <a class="dropdown-item" href="{{ route('admin.news.edit', $item->id) }}">
                                                <i class="fas fa-edit text-orange-peel"></i>Edit
                                            </a>
                                            <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item" onclick="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
                                                    <i class="fas fa-trash-alt text-red"></i>Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">Belum ada data berita</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                <div class="d-flex justify-content-center mt-4">
                    {{ $news->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

