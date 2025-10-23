@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrazione Medico') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        {{-- Hidden fields per abbonamento --}}
                        <input type="hidden" name="subscription_type" id="subscription_type">
                        <input type="hidden" name="subscription_id" id="subscription_id">
                        <input type="hidden" name="is_trial" id="is_trial" value="0">

                        {{-- Nome --}}
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nome') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        {{-- Cognome --}}
                        <div class="row mb-3">
                            <label for="lastname" class="col-md-4 col-form-label text-md-end">{{ __('Cognome') }}</label>
                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror"
                                    name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname">
                                @error('lastname')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        {{-- Codice Fiscale --}}
                        <div class="row mb-3">
                            <label for="codefiscal" class="col-md-4 col-form-label text-md-end">{{ __('Codice Fiscale') }}</label>
                            <div class="col-md-6">
                                <input id="codefiscal" type="text" class="form-control @error('codefiscal') is-invalid @enderror"
                                    name="codefiscal" value="{{ old('codefiscal') }}" required autocomplete="codefiscal">
                                @error('codefiscal')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        {{-- Partita IVA --}}
                        <div class="row mb-3">
                            <label for="vat_number" class="col-md-4 col-form-label text-md-end">{{ __('Partita IVA') }}</label>
                            <div class="col-md-6">
                                <input id="vat_number" type="text" class="form-control @error('vat_number') is-invalid @enderror"
                                    name="vat_number" value="{{ old('vat_number') }}" required autocomplete="vat_number">
                                @error('vat_number')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        {{-- Telefono --}}
                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Telefono') }}</label>
                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                                    name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        {{-- Password --}}
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        {{-- Conferma Password --}}
                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Conferma Password') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        {{-- Sezione abbonamento --}}
                        <hr>
                        <div class="text-center mb-3">
                            <strong>Scegli il tuo piano di abbonamento:</strong>
                        </div>

                        <div class="d-flex justify-content-around flex-wrap">
                            {{-- Prova gratuita --}}
                            <div class="mb-3 text-center">
                                <p>Prova gratuita</p>
                                <button type="button" class="btn btn-outline-secondary" onclick="activateTrial()">Attiva prova</button>
                            </div>

                            {{-- Mensile --}}
                            <div class="mb-3 text-center">
                                <p>Mensile - 20€</p>
                                <div id="paypal-button-monthly" style="max-width: 200px; transform: scale(0.85); transform-origin: top center;"></div>
                            </div>

                            {{-- Annuale --}}
                            <div class="mb-3 text-center">
                                <p>Annuale - 180€</p>
                                <div id="paypal-button-yearly" style="max-width: 200px; transform: scale(0.85); transform-origin: top center;"></div>
                            </div>
                        </div>

                        {{-- Script PayPal --}}
                        <script src="https://www.paypal.com/sdk/js?client-id=AT_Q4GZvWVoI36ArzZX-_MMFqUSXLHr0iXagV7tL5-Z4JfHchuz8CBOSDTIzhVnOYd2hfXFZrIoZ1Doe&vault=true&intent=subscription"></script>
                        <script>
                            function handleSubscription(subscriptionID, type) {
                                document.getElementById('subscription_id').value = subscriptionID;
                                document.getElementById('subscription_type').value = type;
                                document.getElementById('is_trial').value = 0;
                                document.querySelector('form').submit();
                            }

                            function activateTrial() {
                                document.getElementById('subscription_type').value = 0;
                                document.getElementById('is_trial').value = 1;
                                document.querySelector('form').submit();
                            }

                            paypal.Buttons({
                                style: {
                                    shape: 'pill',
                                    color: 'blue',
                                    layout: 'horizontal',
                                    label: 'paypal',
                                    height: 35
                                },
                                createSubscription: function(data, actions) {
                                    return actions.subscription.create({
                                        plan_id: 'P-0E743627NK090184SNDXGR4A' // mensile
                                    });
                                },
                                onApprove: function(data, actions) {
                                    handleSubscription(data.subscriptionID, 1);
                                }
                            }).render('#paypal-button-monthly');

                            paypal.Buttons({
                                style: {
                                    shape: 'pill',
                                    color: 'gold',
                                    layout: 'horizontal',
                                    label: 'paypal',
                                    height: 35
                                },
                                createSubscription: function(data, actions) {
                                    return actions.subscription.create({
                                        plan_id: 'P-7L856029AP269881SNDXGWDI' // annuale
                                    });
                                },
                                onApprove: function(data, actions) {
                                    handleSubscription(data.subscriptionID, 2);
                                }
                            }).render('#paypal-button-yearly');
                        </script>
                    </form>
                </div>
            </div>
