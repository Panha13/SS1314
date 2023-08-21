@extends('admin.layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-6 offset-md-3">
        <form action="{{ isset($slideshow) ? route('admin.slideshow.update') : route('admin.slideshow.add') }}"
            method="POST" enctype="multipart/form-data">

            {{-- <form action="{{route('admin.slideshow.update')}}" method="POST" enctype="multipart/form-data"> --}}
            @if (!@isset($slideshow))
                <h3 class="mt-3">Add Slideshow</h3>
            @else
                <h3 class="mt-3">Edit Slideshow</h3>
                <input type="hidden" name="txtssid" value="{{ $slideshow['ssid'] }}" />
            @endif

            @csrf

            <div class="form-group">
                <label for="txttitle">Title</label>
                <input type="text" class="form-control"
                    value="{{ isset($slideshow) ? $slideshow['title'] : '' }}" id="txttitle" name="txttitle"
                    placeholder="Title">
                @error('txttitle')
                    <div class="text-danger">Required</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="txtsubtitle">Subtitle</label>
                <input type="text" class="form-control"
                    value="{{ isset($slideshow) ? $slideshow['subtitle'] : '' }}" id="txtsubtitle"
                    name="txtsubtitle" placeholder="Subtitle">
                @error('txtsubtitle')
                    <div class="text-danger">Required</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="tatext">Text</label>
                <textarea class="form-control" id="tatext" name="tatext"rows="3">{{ isset($slideshow) ? $slideshow['text'] : '' }}</textarea>
                @error('tatext')
                    <div class="text-danger">Required</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="txtlink">Link</label>
                <input type="text" class="form-control" value="{{ isset($slideshow) ? $slideshow['link'] : '' }}"
                    id="txtlink" name="txtlink" placeholder="Link">
                @error('txtlink')
                    <div class="text-danger">Required</div>
                @enderror
            </div>

            <div class="form-group ms-4">
                <div class="form-check form-switch ">
                    <input class="form-check-input" type="checkbox" id="chkenable" name="chkenable"
                        {{ isset($slideshow) ? ($slideshow['enable'] == '1' ? 'checked' : '') : 'checked' }}>
                    <label class="form-check-label" for="chkenable">Enable</label>
                </div>
            </div>
            <div class="form-group">
                <label for="fileimg">Images</label>
                <input class="form-control" type="file" id="fileimg" name="fileimg">
                @error('fileimg')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            @if (isset($slideshow))
                <div class="form-group">
                    <img src={{ URL::asset('images/slideshows/thumbnail/' . $slideshow->img) }}>
                    <p>{{ $slideshow->img }}</p>
                </div>
            @endif
            <input type="submit" class="btn btn-primary mb-5"
                value="{{ isset($slideshow) ? 'Update slideshow' : 'Add Slideshow' }}" />
            <a href="{{ route('admin.slideshow') }}" class="btn btn-secondary mb-5">Cancel</a>

        </form>
    </div>
</div>
@endsection