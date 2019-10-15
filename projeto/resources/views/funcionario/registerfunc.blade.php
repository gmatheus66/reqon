@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('registerfunc.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="cpf" class="col-md-4 col-form-label text-md-right">CPF</label>

                            <div class="col-md-6">
                                <input id="cpf" type="text" class="form-control" name="cpf" value="{{ old('cpf') }}" required autocomplete="cpf" autofocus>
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="rg_num" class="col-md-4 col-form-label text-md-right">Registro Geral(RG)</label>

                            <div class="col-md-6">
                                <input id="rg_num" type="text" class="form-control" name="rg_num" value="{{ old('rg_num') }}" required autocomplete="rg_num" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="rg_esta" class="col-md-4 col-form-label text-md-right">Estado</label>

                            <div class="col-md-6">
                                <input id="rg_esta" type="text" class="form-control" name="rg_esta" value="{{ old('rg_esta') }}" required autocomplete="rg_esta" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="orgao_exp" class="col-md-4 col-form-label text-md-right">Órgão Expedidor</label>

                            <div class="col-md-6">
                                <input id="orgao_exp" type="text" class="form-control" name="orgao_exp" value="{{ old('orgao_exp') }}" required autocomplete="orgao_exp" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cargo" class="col-md-4 col-form-label text-md-right">Cargo</label>

                            <div class="col-md-6">
                                <input id="cargo" type="text" class="form-control" name="cargo" value="{{ old('cargo') }}" required autocomplete="cargo" autofocus>
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label for="telefone" class="col-md-4 col-form-label text-md-right">Telefone</label>

                            <div class="col-md-6">
                                <input id="telefone" type="text" class="form-control" name="telefone" value="{{ old('telefone') }}" required autocomplete="telefone" autofocus>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="matricula" class="col-md-4 col-form-label text-md-right">Matrícula</label>

                            <div class="col-md-6">
                                <input id="matricula" type="text" class="form-control" name="matricula" value="{{ old('matricula') }}" required autocomplete="matricula" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="senha" required autocomplete="new-password">

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
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
