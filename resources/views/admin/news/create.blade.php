@extends('admin.layouts.master')

@section('title', 'Tambah Berita')

@section('page-title', 'Tambah Berita')

@section('breadcrumbs')
<li><a href="{{ route('admin.news.index') }}">Berita</a></li>
<li>Tambah Berita</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card height-auto">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>Form Tambah Berita</h3>
                    </div>
                </div>
                
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                
                <form method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="title">Judul Berita <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="content">Konten Berita <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="content" name="content" rows="10" required>{{ old('content') }}</textarea>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="category">Kategori <span class="text-danger">*</span></label>
                                <select class="form-control" id="category" name="category" required>
                                    <option value="" selected disabled>Pilih Kategori</option>
                                    <option value="teknologi" {{ old('category') == 'teknologi' ? 'selected' : '' }}>Teknologi</option>
                                    <option value="olahraga" {{ old('category') == 'olahraga' ? 'selected' : '' }}>Olahraga</option>
                                    <option value="politik" {{ old('category') == 'politik' ? 'selected' : '' }}>Politik</option>
                                    <option value="kesehatan" {{ old('category') == 'kesehatan' ? 'selected' : '' }}>Kesehatan</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="author">Penulis</label>
                                <input type="text" class="form-control" id="author" name="author" value="{{ old('author') }}">
                            </div>
                            
                            <div class="form-group">
                                <label for="image">Gambar</label>
                                <input type="file" class="form-control-file" id="image" name="image">
                                <small class="form-text text-muted">Format: jpg, jpeg, png, gif. Maks: 2MB</small>
                            </div>
                            
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="is_featured" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="is_featured">Jadikan Berita Unggulan</label>
                                </div>
                            </div>
                            
                            <div class="form-group mt-5">
                                <button type="submit" class="btn btn-primary btn-block">Simpan Berita</button>
                                <a href="{{ route('admin.news.index') }}" class="btn btn-outline-danger btn-block mt-2">Batal</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content', {
        height: 400,
        filebrowserUploadUrl: "{{ route('admin.news.store') }}?_token={{ csrf_token() }}",
        filebrowserUploadMethod: 'form'
    });
</script>
@endsection

