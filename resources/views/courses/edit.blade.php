@extends('layout.app')

@section('content')
<div class="container-fluid px-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold">Edit Course</h4>
            <p class="text-muted mb-0">
                Update course information in your catalog.
            </p>
        </div>
        <div>
            <a href="{{ url('/courses')  }}" class="btn btn-outline-secondary">
                Cancel
            </a>
            <button form="courseForm" class="btn btn-primary">
                Save Changes
            </button>
        </div>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form id="courseForm"
          action="{{ route('admin.courses.update', $course->id) }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            {{-- LEFT --}}
            <div class="col-lg-8">

                {{-- Course Details --}}
                <div class="card mb-4">
                    <div class="card-body">
                        <h6 class="fw-bold mb-3">Course Details</h6>

                        <div class="mb-3">
                            <label class="form-label">Course Title</label>
                            <input type="text"
                                   name="title"
                                   class="form-control @error('title') is-invalid @enderror"
                                   value="{{ old('title', $course->title) }}">

                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Slug</label>
                            <input type="text"
                                   name="slug"
                                   class="form-control @error('slug') is-invalid @enderror"
                                   value="{{ old('slug', $course->slug) }}">

                            @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description"
                                      rows="4"
                                      class="form-control @error('description') is-invalid @enderror">{{ old('description', $course->description) }}</textarea>

                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Curriculum (UI only) --}}
                <div class="card mb-4">
                    <div class="card-body">
                        <h6 class="fw-bold mb-3">Curriculum</h6>

                        <div class="border rounded p-3 mb-3">
                            <div class="fw-semibold mb-2">Introduction</div>

                            <div class="border rounded p-3 bg-light">
                                <div class="mb-2 fw-semibold">🎥 Video Lesson</div>

                                <div class="mb-2">
                                    <label class="form-label">Video Title</label>
                                    <input type="text"
                                           class="form-control"
                                           placeholder="Welcome to the Course">
                                </div>

                                <div>
                                    <label class="form-label">Video Link (URL)</label>
                                    <input type="url"
                                           class="form-control"
                                           placeholder="https://youtube.com/watch?v=xxxxx">
                                </div>
                            </div>

                            <div class="mt-3 text-center text-muted border rounded py-2">
                                + Add Content
                            </div>
                        </div>

                        <div class="text-center text-muted border rounded py-2">
                            + Add New Section
                        </div>
                    </div>
                </div>

            </div>

            {{-- RIGHT --}}
            <div class="col-lg-4">

                {{-- Publishing --}}
                <div class="card mb-4">
                    <div class="card-body">
                        <h6 class="fw-bold mb-3">Publishing</h6>

                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input"
                                   type="checkbox"
                                   name="is_published"
                                   id="published"
                                   {{ old('is_published', $course->is_published) ? 'checked' : '' }}>

                            <label class="form-check-label" for="published">
                                Published
                            </label>

                            <div class="text-muted small">
                                Make this course visible to students.
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Course Media --}}
                <div class="card mb-4">
                    <div class="card-body">
                        <h6 class="fw-bold mb-3">Course Media</h6>

                        <label class="form-label">Thumbnail</label>
                        <div class="border rounded text-center py-4">
                            <input type="file"
                                   name="image"
                                   class="form-control border-0 @error('image') is-invalid @enderror">

                            @error('image')
                                <div class="text-danger small mt-2">{{ $message }}</div>
                            @enderror

                            @if($course->image)
                                <div class="mt-3">
                                    <img src="{{ asset('storage/' . $course->image) }}"
                                         class="img-fluid rounded"
                                         style="max-height: 120px">
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Pricing --}}
                <div class="card">
                    <div class="card-body">
                        <h6 class="fw-bold mb-3">Pricing</h6>

                        <div class="mb-3">
                            <label class="form-label">Price</label>
                            <input type="number"
                                   step="0.01"
                                   name="price"
                                   class="form-control @error('price') is-invalid @enderror"
                                   value="{{ old('price', $course->price) }}">

                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Delete --}}
                <form method="POST"
                      action="{{ route('admin.courses.destroy', $course->id) }}"
                      class="mt-3">
                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            onclick="return confirm('Are you sure?')"
                            class="btn btn-outline-danger w-100">
                        Delete Course
                    </button>
                </form>

            </div>
        </div>
    </form>
</div>
@endsection
