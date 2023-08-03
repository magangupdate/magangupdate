@extends('dashboard.MU.layouts.main', [
    "title"  => $title,
    "active" => "Articles"
])

@section('content')
<section class="p-3">
        <header>
          <h3>Articles</h3>
          <p><a href="{{ route('dashboard.mu.articles') }}" class="breadcrum-link">Articles</a> > {{ $title }}</p>
        </header>
        <div class="information d-flex flex-column gap-5">
          <div class="row d-flex justify-content-between">
            <div class="col-xl-12 col-12 p-0 ps-xl-2 transaction">
              <h5>Organic Traffic</h5>
              <div class="d-flex flex-row gap-4">
                <div class="d-flex flex-row gap-3">
                  <div class="icon-history">
                    <i class='bx bx-time' style="font-size: 2rem; color: #c9d4f4;"></i>
                  </div>
                  <div class="trans-history flex-fill">
                    <div>
                      <p class="m-0 title">Last View</p>
                      <p class="m-0 date">{{ $lastView }}</p>
                    </div>
                    
                  </div>
                  
                </div>
                <div class="d-flex flex-row gap-3">
                  <div class="icon-history">
                    <i class='bx bxs-heart' style="font-size: 2rem; color: #e10180;"></i>
                  </div>
                  <div class="trans-history flex-fill">
                    <div>
                      <p class="m-0 title">Likes</p>
                      <p class="m-0 date">{{ $likes }}</p>
                    </div>
                    
                  </div>
                </div>
                <div class="d-flex flex-row gap-3">
                  <div class="icon-history">
                    <i class='bx bxs-chat' style="font-size: 2rem; color: #c9d4f4;"></i>
                  </div>
                  <div class="trans-history flex-fill">
                    <div>
                      <p class="title m-0">Comments</p>
                      <p class="date m-0">{{ $comments }}</p>
                    </div>
                    
                  </div>
                </div>
                <div class="d-flex flex-row gap-3">
                  <div class="icon-history">
                    <i class='bx bxs-pointer' style="font-size: 2rem; color: #c9d4f4;"></i>
                  </div>
                  <div class="trans-history flex-fill">
                    <div>
                      <p class="title m-0">Visits</p>
                      <p class="date m-0">{{ $visits }}</p>
                    </div>
                    
                  </div>
                </div>
              </div>
              <div class="row px-1 d-flex justify-content-between add-button" id="btn-edit">
                    <div class="col-12 p-0 mb-5 mb-xl-0 revenue">
                    <div class="col-xl-4 col-12 card debit align-items-center cursor-pointer" style="height: 5rem; width: 84px; cursor: pointer">
                        <p class="number" style="margin-top: -.9rem; font-weight: 400; font-size: 2.3rem;" id="btn-article"><i class='bx bx-pencil' ></i></p>
                    </div>
                    </div>
                </div>
            </div>
          </div>
          <div class="row px-1 d-flex justify-content-between">
            <div class="col-xl-12 col-12 p-0 mb-5 mb-xl-0 revenue">
              <h5>Preview Article</h5>
              <div class="article-preview-container" id="preview-container">
                <h3 class="mt-3 mb-3 text-center">{{ $title }}</h3>
                <img src='{{ asset("storage/storage/$article->thumbnail") }}' alt="" class="img-detail">
                <div class="mt-5">
                    {!! $article->body !!}
                </div>
              </div>
              <div class="article-preview-container" id="edit-container">
                <form method="POST" action="{{ route('dashboard.mu.articles.update') }}"  autocomplete="off" class="create-article needs-validation" enctype="multipart/form-data" novalidate>
                    @csrf
                    @method('PUT')
                    <input type="hidden" value={{ $article->id }} name="id">
                    <div class="mb-3 has-validation">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ $article->title }}" name="title" id="title" aria-describedby="titleHelp" placeholder="Fill your article title">
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="author" class="form-label">Author</label>
                        <input type="text" class="form-control @error('author') is-invalid @enderror" value="{{ $article->author }}" name="author" id="author" aria-describedby="authorHelp" placeholder="Who write this article?">
                        @error('author')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                     <label for="trigger" class="form-label">Thumbnail</label>
                        <div class="mb-3 thumbnail-container-edit @error('thumbnail') is-invalid @enderror d-flex">
                        <div class="drag-area-old">
                            <img src='{{ asset("storage/storage/$article->thumbnail") }}' class="" style="width: 100%;"  alt="" />
                        </div>

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
                    <div class="mb-3">
                        <label for="trigger" class="form-label">Trigger</label>
                        <textarea name="trigger" placeholder="Make your visitor interst to read this article" class="form-control trigger @error('trigger') is-invalid @enderror" id="trigger" rows="6">{{ $article->trigger }}</textarea>
                        @error('trigger')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Body</label>
                        <textarea name="body" id="createArticle" class="@error('body') is-invalid @enderror">{{ $article->body }}</textarea>
                        @error('body')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection