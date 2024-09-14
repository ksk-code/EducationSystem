@extends('users.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- <div class="card-header">{{ __('') }}</div> -->

                <div class="card-body">
                    <div class="row">
                        <div class="col text-end mb-3">
                            <a link href="{{ route('user.show.login') }}">ログインはこちら</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="row text-center mb-3">
                            <h1>新規会員登録</h1>
                        </div>
                    </div>
                    
                    <form method="POST" action="{{ route('user.show.register') }}" id="registrationForm">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('ユーザーネーム') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('username') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name_kana" class="col-md-4 col-form-label text-md-end">{{ __('カナ') }}</label>
                            <div class="col-md-6">
                                <input id="name_kana" type="text" class="form-control @error('name') is-invalid @enderror" name="name_kana" value="{{ old('name_kana') }}" required autocomplete="name" autofocus>
                                @if ($errors->has('name_kana'))
                                    <span class="text-danger">{{ $errors->first('name_kana') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('メールアドレス') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('パスワード') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('パスワード確認') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col text-center">
                                <button type="button" class="btn btn-primary w-25" id="registerButton">
                                    {{ __('登録') }}
                                </button>
                            </div>
                        </div>
                    </form>

                    @include('users.layouts.confirm_modal')
                
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
