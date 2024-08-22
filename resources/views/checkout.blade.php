@extends('layouts.base')

@section('content')
<div class="billing-container">
    <h3 class="billing-title">Billing Address</h3>
    <form>
        <div class="billing-inputBox">
            <label for="full-name">Nom et Prénom:</label>
            <input type="text" id="full-name" placeholder="Votre nom" required>
        </div>
        
        <div class="billing-inputBox">
            <label for="phone-number">Numéro de téléphone:</label>
            <input type="tel" id="phone-number" placeholder="Votre numéro" required>
        </div>
        <div class="billing-inputBox">
            <label for="second-phone-number">Numéro de téléphone 2 : (optional):</label>
            <input type="tel" id="second-phone-number" placeholder="Votre numéro">
        </div>
        <div class="billing-inputBox">
            <label for="address">Adresse:</label>
            <input type="text" id="address" placeholder="Votre adresse" required>
        </div>
        <div class="billing-inputBox">
            <label for="city">Région:</label>
            <input type="text" id="city" placeholder="Votre région" required>
        </div>
        <div class="billing-inputBox">
            <label for="email">Email (optional):</label>
            <input type="email" id="email" placeholder="Votre adresse Email">
        </div>
        
        <button type="submit" class="billing-submit-btn">Proceed to Checkout</button>
        
    </form>
</div>
@endsection
