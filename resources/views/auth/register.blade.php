@extends('layouts.app')

@section('content')
<div class="container">
        <div class="col-md-12">

                <div class="card-body">
                  <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">


                           <div class="col-md-12 col-md-push-1 animate-box">
                             <div class="row">
                               <div class="form-group row">
                               <div class="col-md-6 text-center col-md-offset-2">
                                   <!-- <input type="text" class="form-control" placeholder="ID"> -->
                                   <input id="userid" type="text" placeholder="userid" class="form-control{{ $errors->has('userid') ? ' is-invalid' : '' }}" name="userid" value="{{ old('userid') }}" required autofocus>
                                   @if ($errors->has('userid'))
                                       <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('userid') }}</strong>
                                   </span>
                                   @endif
                                 </div>
                               </div>
                               <div class="form-group row">
                               <div class="col-md-6 text-center col-md-offset-2">
                                   <input id="password" type="password" placeholder="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                   @error('password')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                   @enderror
                                 </div>
                               </div>

                               <div class="form-group row">

                                   <div class="col-md-6 text-center col-md-offset-2">
                                       <input id="password-confirm" placeholder="password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                   </div>
                               </div>

                               <div class="form-group row mb-0">
                                   <div class="col-md-6 col-md-offset-6">
                                       <button type="submit" class="btn btn-primary">
                                           {{ __('Register') }}
                                       </button>
                                   </div>
                               </div>

                             </div>
                           </div>


                        </div>
                    </form>

        </div>
</div>
</div>
@endsection
