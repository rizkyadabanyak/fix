    @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf



                        <div class="input-field col s6">
                            <input  id="email" type="email" name="email" value="{{ old('email') }}" class="validate{{ $errors->has('email') ? ' is-invalid' : '' }}" >
                            <label for="email">{{ __('E-Mail Address') }}</label>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input   id="password" type="password" class="validate{{ $errors->has('password') ? ' is-invalid' : '' }}"  name="password" required>
                                <label for="password">Password</label>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary center">
                            {{ __('Login') }}
                        </button>



                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
