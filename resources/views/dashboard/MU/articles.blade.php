@extends('dashboard.MU.layouts.main', [
    "title"  => "Articles",
    "active" => "Articles"
])

@section('content')
<section class="p-3">
        <header>
          <h3>Articles</h3>
          <p>Manage your article and see it growth</p>
        </header>
        <div class="information d-flex flex-column gap-5">
          {{-- @if(Auth::user()->role !== 'Manager') --}}
          <div class="row px-1 d-flex justify-content-between add-button">
            <div class="col-12 p-0 mb-5 mb-xl-0 revenue" >
              <a href="{{ route('dashboard.mu.articles.create') }}" class="col-xl-4 col-12 card debit align-items-center cursor-pointer" style="height: 5rem; width: fit-content; cursor: pointer">
                <p class="number" style="margin-top: -.9rem; font-weight: 400; font-size: 2.3rem;">+</p>
              </a>
            </div>
          </div>
          {{-- @endif --}}
          <div class="row px-1 d-flex justify-content-between">
            <div class="col-xl-12 col-12 p-0 mb-5 mb-xl-0 revenue">
              <h5>Tracking and modifying your article</h5>
              <div>
                <table id="example" class="table text-white" style="width:100%">
        <thead>
            <tr>
                <th></th>
                <th>Title</th>
                <th>Author</th>
                <th>Trigger</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr class="p-5">
                    <td class="w-[10rem]">
                        <img src='{{ asset("storage/storage/$article->thumbnail") }}' alt="" class="img-cover object-cover">
                    </td>
                    <td>{{ $article->title }}</td>
                    <td style="text-align: justify;">{{ $article->author }}</td>
                    <td style="text-align: justify;">{{ $article->trigger }}</td>
                    <td>{{ date('D, d F Y', strtotime($article->created_at)) }}</td>
                    <td class="" style="height: 100%;">
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="/dashboard/articles/{{ $article->slug }}" class="btn btn-primary"><i class='bx bx-info-circle'></i></a>&nbsp;
                            {{-- @if(Auth::user()->role !== 'Manager') --}}
                              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $article->id }}"><i class='bx bx-trash-alt'></i></button>&nbsp;
                            {{-- @endif --}}
                        </div>
                    </td>
                </tr>

                <!-- Modal -->
                <div class="modal fade" id="deleteModal-{{ $article->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Article</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('dashboard.mu.articles.destroy') }}" class="needs-validation" method="post" novalidate>
                                @csrf
                                @method('DELETE')
                                <div class="modal-body mt-3">
                                    <input type="hidden" name="id" class="form-control" value="{{ $article->id }}" id="id">
                                    <p>Are you sure want delete <b>{{ $article->title }}</b> article ?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="editModal-{{ $article->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Testimonial Data</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="" class="needs-validation" method="POST" novalidate>
                                @csrf
                                <div class="modal-body">
                                    <input type="hidden" name="id" class="form-control" value="{{ $article->id }}" id="id">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control" value="{{ $article->name }}" id="name" placeholder="Division's name">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                Please choose a name.
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label for="jabatan" class="form-label">Jabatan</label>
                                            <input type="text" name="jabatan" class="form-control" value="{{ $article->jabatan }}" id="jabatan" placeholder="Division's Jabatan">
                                            @error('jabatan')
                                                <div class="invalid-feedback">
                                                    Please choose a jabatan.
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="batch" class="form-label">Batch</label>
                                            <input type="number" name="batch" class="form-control" value="{{ $article->batch }}" id="batch" placeholder="Testimonial's batch">
                                            @error('batch')
                                                <div class="invalid-feedback">
                                                    Please choose a batch.
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="testimonial" class="form-label">Testimonial</label>
                                        <textarea class="form-control" name="testimonial" id="testimonialsEdit" rows="10">{{ $article->testimonial }}</textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th></th>
                <th>Title</th>
                <th>Author</th>
                <th>Trigger</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </tfoot>
    </table>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection