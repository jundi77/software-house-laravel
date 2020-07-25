@extends('include.template')
@section('title', 'Daftar')
@section('content')
<section class="register">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card register-card">
                    <div class="card-header text-center register-header">{{ __('Daftar') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <div class="col-md-6" style="margin:auto">
                                    <div class="image-preview" id="imagePreview">
                                        <input id="profile_pic" type="file" accept="image/x-png,image/gif,image/jpeg" class="form-control @error('profile_pic') is-invalid @enderror" name="profile_pic" value="{{ old('profile_pic') }}" required>
                                        <img src="" alt="Foto Profile" class="image-preview-photo">                                        
                                        <span class="image-preview-text">
                                            <i class="fa fa-download"></i>
                                            Unggah Fotomu...
                                        </span>
                                    </div>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-modif form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-modif form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control form-modif @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control form-modif @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-modif form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-3 mt-5">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-prim">
                                        {{ __('Daftar') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    const inputImg = document.getElementById('profile_pic');
    const previewContainer = document.getElementById('imagePreview');
    const imagePreview = previewContainer.querySelector('.image-preview-photo');
    const previewDefaultText = previewContainer.querySelector('.image-preview-text')
    let imgSrc = null;

    inputImg.addEventListener("change", (e) => {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            previewDefaultText.style.display = "none";
            imagePreview.style.display = "block";

            reader.addEventListener("load", (e) => {
                imagePreview.setAttribute("src", e.target.result);

                imgSrc = e.target.result;
            })

            reader.readAsDataURL(file);
        }
    })

    previewContainer.onmouseover = (e) => {
        if (imgSrc && e.type == "mouseover") {
            previewDefaultText.style.display = "block";
            previewDefaultText.style.position = "absolute";
            imagePreview.style.opacity = 0.3
        }
    }
    previewContainer.onmouseout = (e) => {
        if (imgSrc && e.type == "mouseout") {
            previewDefaultText.style.display = "none";
            imagePreview.style.opacity = 1
            previewDefaultText.style.position = "initial";
        }
    }
</script>
@endsection
