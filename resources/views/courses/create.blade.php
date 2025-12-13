@extends('layout.app')

@section('content')
<div class="container-fluid px-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold">Add New Course</h4>
            <p class="text-muted mb-0">Create a new course to add to your catalog.</p>
        </div>
        <div>
            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">Cancel</a>
            <button form="courseForm" class="btn btn-primary">Save Course</button>
        </div>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form id="courseForm"
          action="{{ route('admin.courses.store') }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf

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
                                   value="{{ old('title') }}"
                                   placeholder="e.g. Advanced React Patterns">

                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description"
                                      rows="4"
                                      class="form-control @error('description') is-invalid @enderror"
                                      placeholder="Describe what students will learn...">{{ old('description') }}</textarea>

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

                {{-- Publishing (UI only) --}}
                <div class="card mb-4">
                    <div class="card-body">
                        <h6 class="fw-bold mb-3">Publishing</h6>

                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input"
                                   type="checkbox"
                                   name="is_published"
                                   id="published">
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
                        <div class="border rounded text-center py-5">
                            <input type="file"
                                   name="image"
                                   class="form-control border-0 @error('image') is-invalid @enderror">

                            @error('image')
                                <div class="text-danger small mt-2">{{ $message }}</div>
                            @enderror

                            <div class="text-muted mt-2">
                                Upload Thumbnail
                            </div>
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
                                   value="{{ old('price') }}">

                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>
@endsection
