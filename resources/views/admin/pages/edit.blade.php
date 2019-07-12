@extends('admin.partials.app')

@section('content')
<div class="d-flex flex-column">

    <div class="d-flex justify-content-around">
        <div class="col-md-9">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-between">
                        <div class="col-8">
                            <h3 class="mb-0">Edit Page</h3>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ url("admin/pages/$page->id") }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label class="form-control-label">Title</label>

                            <input type="text" id="title" name="title" placeholder="Title"
                                class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                value="{{ null !== old('title') ? old('title') : $page->title }}">

                            @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Slug</label>

                            <input type="text" id="slug" name="slug" placeholder="Slug"
                                class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}"
                                value="{{ null !== old('slug') ? old('slug') : $page->slug }}">

                            @error('slug')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Description</label>

                            @error('description')
                            <p class="text-warning">
                                <small>
                                    {{ $message }}
                                </small>
                            </p>
                            @enderror

                            <textarea class="description" name="description"
                                rows="10">{!! $page->description !!}</textarea>
                        </div>

                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                        <a href="{{ url('admin/pages') }}" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection