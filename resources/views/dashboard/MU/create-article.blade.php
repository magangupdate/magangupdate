@extends('dashboard.MU.layouts.main', [
    "title"  => "Create Article",
    "active" => "Articles"
])

@section('content')
<section class="p-3 text-white">
        <header>
          <h3>Create New Article</h3>
          <p>Create and post your article</p>
        </header>
        <div class="information d-flex flex-column gap-5">
          <div class="row px-1 d-flex justify-content-between">
            <div class="col-xl-12 col-12 p-0 mb-5 mb-xl-0 revenue">
              {{-- <h5>Preview Article</h5> --}}
              <div class="">
                <form method="POST" action="{{ route('dashboard.mu.articles.store') }}"  autocomplete="off" class="create-article needs-validation" enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="mb-3 has-validation">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" name="title" id="title" aria-describedby="titleHelp" placeholder="Fill your article title">
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="author" class="form-label">Author</label>
                        <input type="text" class="form-control @error('author') is-invalid @enderror" value="{{ old('author') }}" name="author" id="author" aria-describedby="authorHelp" placeholder="Who write this article?">
                        @error('author')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                     <label for="trigger" class="form-label">Thumbnail</label>
                    <div class="mb-3 thumbnail-container @error('thumbnail') is-invalid @enderror">
                        <div class="drag-area">
                            <div class="browse-thumbnail flex-column align-items-center justify-content-center">
                                <div class="icon mb-4">
                                    <i class='bx bx-images' style="font-size: 40px"></i>
                                </div>

                                <span class="header">Choose your thumbnail</span>
                                <span class="header">and <span class="button">browse</span></span>
                                <span class="support">Supports: Webp</span>
                            </div>
                            
                             <input type="file" hidden name="thumbnail" class="thumbnail-input" id="thumbnail">
                            <img src="" class="img-preview" alt="" />
                        </div>
                    </div>
                    @error('thumbnail')
                            <div class="invalid-feedback mb-4">
                                {{ $message }}
                            </div>
                    @enderror
                    <div class="mb-3">
                        <label for="trigger" class="form-label">Trigger</label>
                        <textarea name="trigger" placeholder="Make your visitor interst to read this article" class="form-control trigger @error('trigger') is-invalid @enderror bg-[#2d2d2d]" id="trigger" rows="6">{{ old('trigger') }}</textarea>
                        @error('trigger')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Body</label>
                        <textarea name="body" placeholder="Write your article here" id="createArticle" class="@error('body') is-invalid @enderror bg-[#2d2d2d]">{{ old('body') }}</textarea>
                        @error('body')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection