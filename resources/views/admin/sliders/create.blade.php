@extends('layouts.admin')

@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>New Slide</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <div class="text-tiny">Dashboard</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <a href="{{ route('admin.sliders.index') }}">
                        <div class="text-tiny">Slider</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">New Slide</div>
                </li>
            </ul>
        </div>

        <div class="wg-box">
            <form class="form-new-product form-style-1" action="{{ route('admin.sliders.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <fieldset class="name">
                    <div class="body-title">Title <span class="tf-color-1">*</span></div>
                    <input class="flex-grow" type="text" placeholder="Title" name="title" tabindex="0"
                        value="{{ old('title') }}" aria-required="true" required="">
                    @error('title')
                    <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </fieldset>
                <fieldset class="name">
                    <div class="body-title">Tagline <span class="tf-color-1">*</span></div>
                    <input class="flex-grow" type="text" placeholder="Tagline" name="title_small" tabindex="0"
                        value="{{ old('title_small') }}" aria-required="true" required="">
                    @error('title_small')
                    <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </fieldset>
                <fieldset class="name">
                    <div class="body-title">Subtitle <span class="tf-color-1">*</span></div>
                    <input class="flex-grow" type="text" placeholder="Subtitle" name="subtitle" tabindex="0"
                        value="{{ old('subtitle') }}" aria-required="true" required="">
                    @error('subtitle')
                    <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </fieldset>
                <fieldset class="name">
                    <div class="body-title">Button Text <span class="tf-color-1">*</span></div>
                    <input class="flex-grow" type="text" placeholder="Button Text" name="button_text" tabindex="0"
                        value="{{ old('button_text') }}" aria-required="true" required="">
                    @error('button_text')
                    <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </fieldset>
                <fieldset class="name">
                    <div class="body-title">Button Link <span class="tf-color-1">*</span></div>
                    <input class="flex-grow" type="url" placeholder="https://example.com" name="button_link" tabindex="0"
                        value="{{ old('button_link') }}" aria-required="true" required="">
                    @error('button_link')
                    <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </fieldset>
                <fieldset>
                    <div class="body-title">Upload images <span class="tf-color-1">*</span></div>
                    <div class="upload-image flex-grow">
                        <div class="item" id="imgpreview" style="display:none">
                            <img src="" class="effect8" alt="">
                        </div>
                        <div id="upload-file" class="item up-load">
                            <label class="uploadfile" for="myFile">
                                <span class="icon">
                                    <i class="icon-upload-cloud"></i>
                                </span>
                                <span class="body-text">Drop your images here or select <span
                                        class="tf-color">click to browse</span></span>
                                <input type="file" id="myFile" name="image" accept="image/*">
                            </label>
                        </div>
                    </div>
                    @error('image')
                    <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </fieldset>

                <div class="bot">
                    <div></div>
                    <button class="tf-button w208" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    (function($) {
        $('#myFile').on('change', function() {
            var file = this.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imgpreview').show().find('img').attr('src', e.target.result);
                };
                reader.readAsDataURL(file);
            }
        });
    })(jQuery);
</script>
@endpush
