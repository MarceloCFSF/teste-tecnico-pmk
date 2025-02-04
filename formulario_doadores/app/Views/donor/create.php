<?php
require_once __DIR__ . '/../../../autoload.php';

use App\Handlers\FormHandler;

$form = new FormHandler();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/assets/css/donor_form.css">
  <title>Cadastro de doadores</title>
</head>

<body>
  <h1>Cadastro de doadores</h1>

  <form method="post">
    <fieldset>
      <legend>Dados pessoais</legend>

      <div class="field">
        <label for="name">Nome</label>
        <input id="name" name="name" value="<?= $form->old('name') ?>" type="text">
        <?= $form->error('name') ?>
      </div>

      <div class="field">
        <label for="email">Email</label>
        <input id="email" name="email" value="<?= $form->old('email') ?>" type="email">
        <?= $form->error('email') ?>
      </div>

      <div class="flex-row">
        <div class="field">
          <label for="cpf">CPF</label>
          <input id="cpf" name="cpf" value="<?= $form->old('cpf') ?>" type="text">
          <?= $form->error('cpf') ?>
        </div>
  
        <div class="field">
          <label for="phone">Telefone</label>
          <input id="phone" name="phone" value="<?= $form->old('phone') ?>" type="text">
          <?= $form->error('phone') ?>
        </div>
  
        <div class="field">
          <label for="birthday">Data de Nascimento</label>
          <input id="birthday" name="birthday" value="<?= $form->old('birthday') ?>" type="date">
          <?= $form->error('birthday') ?>
        </div>
      </div>
    </fieldset>

    <fieldset>
      <legend>Doação</legend>

      <div style="display: flex; gap: 5em;">
        <div class="field">
          <label for="payment_interval">Intervalo de doação</label>
          <select name="payment_interval" id="payment_interval">
            <option value="">Selecione</option>
            <option value="unique">Único</option>
            <option value="bimonthly">Bimestral</option>
            <option value="semi-annual">Semestral</option>
            <option value="annual">anual</option>
          </select>
          <?= $form->error('payment_interval') ?>
        </div>
  
        <div class="field">
          <label for="value">Valor da doação</label>
          <input id="value" name="value" type="text">
          <?= $form->error('value') ?>
        </div>
      </div>

      <div class="field">
          <label>Selecione a forma de pagamento</label>
          
          <label>
            <input type="radio" id="credit" value="credit" name="payment_type" onchange="toggleInput()">Crédito
          </label>
  
          <label for="debit">
            <input type="radio" id="debit" value="debit" name="payment_type" onchange="toggleInput()">Débito
          </label>
        <?= $form->error('payment_type') ?>
      </div>

      <div id="debit_field" class="field" style="display: none;">
        <label for="account">Número da Conta</label>
        <input id="account" name="account" type="number">
        <?= $form->error('account') ?>
      </div>

      <div id="credit_field" style="display: none;">
        <div class="field">
          <label for="first_card_numbers">Primeiros números do cartão</label>
          <input id="first_card_numbers" name="first_card_numbers" type="number">
          <?= $form->error('first_card_numbers') ?>
        </div>

        <div class="field">
          <label for="last_card_numbers">Últimos números do cartão</label>
          <input id="last_card_numbers" name="last_card_numbers" type="number">
          <?= $form->error('last_card_numbers') ?>
        </div>
      </div>
      <?= $form->error('credit_card') ?>
    </fieldset>

    <fieldset>
      <legend>Endereço</legend>

      <div class="address-fields">
        <div class="field" style="width: 100%;">
          <label for="street">Rua / Avenida</label>
          <input id="street" name="street" value="<?= $form->old('street') ?>" type="text">
          <?= $form->error('street') ?>
        </div>
  
        <div class="field">
          <label for="address_number">Número</label>
          <input id="address_number" name="address_number" value="<?= $form->old('address_number') ?>" type="number">
          <?= $form->error('address_number') ?>
        </div>
      </div>

      <div class="flex-row">
        <div class="field">
          <label for="neighborhood">Bairro</label>
          <input id="neighborhood" name="neighborhood" value="<?= $form->old('neighborhood') ?>" type="text">
          <?= $form->error('neighborhood') ?>
        </div>

        <div class="field">
          <label for="state">Estado</label>
          <input id="state" name="state" value="<?= $form->old('state') ?>" type="text">
          <?= $form->error('state') ?>
        </div>

        <div class="field">
          <label for="city">Cidade</label>
          <input id="city" name="city" value="<?= $form->old('city') ?>" type="text">
          <?= $form->error('city') ?>
        </div>
      </div>

    </fieldset>

    <button type="submit">Enviar</button>
  </form>

  <script src="/assets/js/form.js"></script>
</body>

</html>