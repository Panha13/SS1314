@extends("admin.layouts.admin")
@section("content")
<main class="content">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            @if(isset($slideshow))
                <h3>Edit Slideshow</h3>
                <form action="{{ route('admin.slideshow.update', ['id' => $slideshow->id]) }}" method="POST" enctype="multipart/form-data">
            @else
                <h3>Add Slideshow</h3>
                <form action="{{ route('admin.slideshow.add') }}" method="POST" enctype="multipart/form-data">
            @endif
                @csrf

                <div class="form-group">
                    <label for="txttitle">Title</label>
                    <input type="text" class="form-control" id="txttitle" name="txttitle" placeholder="Title" value="{{ isset($slideshow) ? $slideshow->title : old('txttitle') }}">
                    @error('txttitle')
                        <div class="text-danger">Required</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="txtsubtitle">Subtitle</label>
                    <input type="text" class="form-control" id="txtsubtitle" name="txtsubtitle" placeholder="Subtitle" value="{{ isset($slideshow) ? $slideshow->subtitle : old('txtsubtitle') }}">
                    @error('txtsubtitle')
                        <div class="text-danger">Required</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tatext">Text</label>
                    <textarea class="form-control" id="tatext" name="tatext" rows="3">{{ isset($slideshow) ? $slideshow->text : old('tatext') }}</textarea>
                    @error('tatext')
                        <div class="text-danger">Required</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="txtlink">Link</label>
                    <input type="text" class="form-control" id="txtlink" name="txtlink" placeholder="Link" value="{{ isset($slideshow) ? $slideshow->link : old('txtlink') }}">
                    @error('txtlink')
                        <div class="text-danger">Required</div>
                    @enderror
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="chkenable" name="chkenable" {{ isset($slideshow) && $slideshow->enable == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="chkenable">Enable</label>
                </div>
                <div class="mb-3">
                    <label for="img">Image</label>
                    <input class="form-control" type="file" id="fileimg" name="fileimg">
                    @error('img')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <input type="submit" class="btn btn-primary" value="{{ isset($slideshow) ? 'Update Slideshow' : 'Add Slideshow' }}">
                <a href="{{ route('admin.slideshow') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</main>
@endsection
