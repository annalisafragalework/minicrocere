@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrazione Medico') }}</div>

                <div class="card-body">
                    {{-- Messaggi di conferma --}}
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if(session('info'))
                        <div class="alert alert-info">{{ session('info') }}</div>
                    @endif

                    {{-- FORM PRINCIPALE: Ho aggiunto l'ID 'mainRegisterForm' --}}
                   <form method="POST" action="{{ route('register') }}" id="mainRegisterForm">
    @csrf

    {{-- Hidden fields --}}
    <input type="hidden" name="is_trial" id="is_trial" value="0">
    <input type="hidden" name="subscription_type" id="subscription_type">
    <input type="hidden" name="subscription_id" id="subscription_id">

    {{-- Nome --}}
    <div class="mb-3">
        <label for="name">Nome</label>
        <input id="name" name="name" type="text" class="form-control" required>
    </div>

    {{-- Cognome --}}
    <div class="mb-3">
        <label for="lastname">Cognome</label>
        <input id="lastname" name="lastname" type="text" class="form-control" required>
    </div>

    {{-- Codice Fiscale --}}
    <div class="mb-3">
        <label for="fiscal_code">Codice Fiscale</label>
        <input id="fiscal_code" name="fiscal_code" type="text" class="form-control" required>
    </div>

    {{-- Partita IVA --}}
    <div class="mb-3">
        <label for="vat_number">Partita IVA</label>
        <input id="vat_number" name="vat_number" type="text" class="form-control" required>
    </div>

    {{-- Telefono --}}
    <div class="mb-3">
        <label for="phone">Telefono</label>
        <input id="phone" name="phone" type="text" class="form-control" required>
    </div>

    {{-- Email --}}
    <div class="mb-3">
        <label for="email">Email</label>
        <input id="email" name="email" type="email" class="form-control" required>
    </div>

    {{-- Password --}}
    <div class="mb-3">
        <label for="password">Password</label>
        <input id="password" name="password" type="password" class="form-control" required>
    </div>

    {{-- Conferma Password --}}
    <div class="mb-3">
        <label for="password_confirmation">Conferma Password</label>
        <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" required>
    </div>

    <hr>
    <div class="text-center mb-3">
        <strong>Scegli il tuo piano di abbonamento:</strong>
    </div>

    <div class="d-flex justify-content-around flex-wrap">
        {{-- Bottone prova gratuita --}}
        <div class="mb-3 text-center">
            <button 
                type="button" 
                class="btn btn-outline-secondary"
                onclick="setTrialActionAndSubmit('{{ route('register.activate-trial') }}')">
                Attiva prova gratuita
            </button>
        </div>

        {{-- Bottone PayPal mensile --}}
        <div class="mb-3 text-center">
            <p>Mensile - 0,01€</p>
            <button type="button" class="btn btn-primary" onclick="validateAndRenderPaypal()">
                Procedi al pagamento
            </button>
            <div id="paypal-button-container" style="display: none;"></div>
        </div>
    </div>
</form>

{{-- PayPal SDK --}}
 <script src="https://www.paypal.com/sdk/js?client-id=AT_Q4GZvWVoI36ArzZX-_MMFqUSXLHr0iXagV7tL5-Z4JfHchuz8CBOSDTIzhVnOYd2hfXFZrIoZ1Doe&vault=true&intent=subscription"></script>


<script>
function setTrialActionAndSubmit(trialUrl) {
    const form = document.getElementById('mainRegisterForm');
    if (!form) return console.error('Form non trovato');

    const requiredFields = [
        'name',
        'lastname',
        'fiscal_code',
        'vat_number',
        'phone',
        'email',
        'password',
        'password_confirmation'
    ];

    let valid = true;

    requiredFields.forEach(id => {
        const input = document.getElementById(id);
        if (!input || !input.value.trim()) {
            if (input) {
                input.classList.add('is-invalid');
                input.classList.remove('is-valid');
            }
            valid = false;
        } else {
            input.classList.remove('is-invalid');
            input.classList.add('is-valid');
        }
    });

    // Verifica che le password coincidano
    const password = document.getElementById('password');
    const confirm = document.getElementById('password_confirmation');
    if (password && confirm && password.value !== confirm.value) {
        confirm.classList.add('is-invalid');
        confirm.classList.remove('is-valid');
        valid = false;
    }

    if (!valid) {
        console.warn('Validazione fallita: controlla i campi evidenziati');
        return;
    }

    form.action = trialUrl;

    const trialInput = document.getElementById('is_trial');
    if (trialInput) {
        trialInput.value = 1;
    }

    disableButtons();
    form.submit();
}


function validateAndRenderPaypal() {
    const form = document.getElementById('mainRegisterForm');
    const requiredFields = ['name', 'lastname', 'fiscal_code', 'vat_number', 'phone', 'email', 'password', 'password_confirmation'];
    let valid = true;

    requiredFields.forEach(id => {
        const input = document.getElementById(id);
        if (!input || !input.value.trim()) {
            input.classList.add('is-invalid');
            valid = false;
        } else {
            input.classList.remove('is-invalid');
        }
    });

    if (!valid) return;

    const container = document.getElementById('paypal-button-container');
    container.style.display = 'block';

    disableButtons();

    if (!window.paypalRendered) {
        window.paypalRendered = true;

        paypal.Buttons({
    createSubscription: function(data, actions) {
        return actions.subscription.create({
            plan_id: 'P-4A390585E6026180KNDYK56A'  
        });
    },
    onApprove: function(data, actions) {
        document.getElementById('subscription_type').value = 'monthly';
        document.getElementById('subscription_id').value = data.subscriptionID;

        document.getElementById('mainRegisterForm').submit();
    },
    onError: function(err) {
        alert('Errore durante la sottoscrizione: ' + err);
        enableButtons();
    }
}).render('#paypal-button-container');
    }
}

function disableButtons() {
    const buttons = document.querySelectorAll('button');
    buttons.forEach(btn => btn.disabled = true);
}

function enableButtons() {
    const buttons = document.querySelectorAll('button');
    buttons.forEach(btn => btn.disabled = false);
}
</script>





                </div>
            </div>
        </div>
    </div>
</div>
@endsection


