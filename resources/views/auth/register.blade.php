@extends('frontend.layouts.app')

@section('content')

    <div class="row">
        <div class="col s12 m6 offset-m3">
            <div class="card">
                <h4 class="center indigo-text uppercase p-t-30">{{ __('Registrarse') }}</h4>

                <div class="p-20">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <input type="hidden" name="agent_id" value="{{ DB::table('users')->where('role_id', '1')->value('id') }}">
                        
                        <div class="row">
                            <div class="input-field col s12">
                                <label for="name">{{ __('Nombre') }}</label>
                                <input id="name" type="text" class="{{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="helper-text" data-error="wrong" data-success="right">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <label for="email">{{ __('Direccion de E-Mail') }}</label>
                                <input id="email" type="email" class="{{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="helper-text" data-error="wrong" data-success="right">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="input-field col s12">
                                <label for="whatsapp">{{ __('Whatsapp') }}</label>
                                <input id="whatsapp" type="number" name="whatsapp" value="{{ $errors->has('whatsapp') ? 'is-invalid' : ''}}">

                                @if ($errors->has('whatsapp'))
                                    <span class="helper-text" data-error="wrong" data-success="right">
                                        <strong>{{ $errors->first('whatsapp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="input-field col s12">
                                <label for="password">{{ __('Contraseña') }}</label>
                                <input id="password" type="password" class="{{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" required>
                                
                                @if ($errors->has('password'))
                                <span class="helper-text" data-error="wrong" data-success="right">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="input-field col s12">
                                <label for="password-confirm">{{ __('Confirmar Contraseña') }}</label>
                                <input id="password-confirm" type="password" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="card">
                        <label class="label-custom" for="plan">Registrarme como:</label>
                        <p>
                            <label>
                                <input class="with-gap" name="plan" value ="Plan mensual - Pagando $599,99 por mes" type="radio"  />
                                <span>Agente Plan mensual - $599,99 por mes</span>
                            </label>
                        </p>
                        <p>
                            <label>
                                <input class="with-gap" name="plan" value ="Plan trimestral - Pagando $1709,97 en total" type="radio"  />
                                <span>Agente Plan trimestral - $1709,97 en total</span>
                            </label>
                        </p>
                        <p>
                            <label>
                                <input class="with-gap" name="plan" value ="Plan semestral - Pagando $3239,94 en total" type="radio"  />
                                <span>Agente Plan semestral - $3239,94 en total</span>
                            </label>
                        </p>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <button type="submit" class="waves-effect waves-light btn indigo">
                                    {{ __('Registrarse') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
