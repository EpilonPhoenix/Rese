@extends('Layouts.app')

@section('Css')
    <link rel="stylesheet" href="{{ asset('assets/css/Casher.css') }}" />
    <script src="https://js.stripe.com/v3/"></script>
    <script language="javascript" type="text/javascript">
        window.addEventListener('load', function(){
            const stripe = Stripe('pk_test_51NGBwbI32L0wC4gydUgUeDccTVYER7z7u8NQOOdI00ikjmpPc6Ze1NLM9tWAj49NUWnOinX4ZuGqdlRUhTLQ7hbP00G0PnOhQS');
            const elements = stripe.elements();
            const cardElement = elements.create('card');
            cardElement.mount('#card-element');

            const cardHolderName = document.getElementById('card-holder-name');
            const cardButton = document.getElementById('card-button');

            cardButton.addEventListener('click', async (e) => {
            e.preventDefault();
            console.log("通常挙動を停止");

            const { paymentMethod, error } = await stripe.createPaymentMethod(
                'card', cardElement, {
                    billing_details: { name: cardHolderName.value }
                }
            );
            console.log("paymentMethodの生成");
            if (error) {
                    // "error.message"をユーザーに表示…
                    console.log("失敗");
                } else {
                    // カードは正常に検証された…
                    stripePaymentIdHandler(paymentMethod.id);
                }
            });

            function stripePaymentIdHandler(paymentMethodId) {
            // Insert the paymentMethodId into the form so it gets submitted to the server
            const form = document.getElementById('setup-form');

            const hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'paymentMethodId');
            hiddenInput.setAttribute('value', paymentMethodId);
            form.appendChild(hiddenInput);
            // Submit the form
            console.log("formの送信");
            form.submit();
            }
        })
    </script>

@endsection

@section('pagetitle','Rese Mypage')

@section('contents')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Purchase') }}
        </h2>
    </x-slot>

    <div class="layout__center Card">
        <div class="layout__center width100">
            <div class="layout__center width100">
                <div class="layout__center width100">
                <h2>購入</h2>
                <form id="setup-form" action="{{ route('purchase.post') }}" method="post" class="width100">
                    @csrf
                    <input id="card-holder-name" type="text" placeholder="カード名義人" name="card-holder-name">
                    <div id="card-element" class="card-element"></div>
                    <button id="card-button" class="card-button">
                        支払
                    </button>
                </form>
                </div>
            </div>
        </div>
    </div>

    @if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        {{$error}}
    @endforeach
    @endif
@endsection