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
  <title>Cadastro de doadores</title>
</head>

<body>
  <h1>Cadastro de doadores</h1>

  <form method="post">
    <fieldset>
      <legend>Dados pessoais</legend>

      <label for="name">Nome</label>
      <input id="name" name="name" value="<?= $form->old('name') ?>" type="text">
      <?= $form->error('name') ?>

      <label for="email">Email</label>
      <input id="email" name="email" value="<?= $form->old('email') ?>" type="email">
      <?= $form->error('email') ?>

      <label for="cpf">CPF</label>
      <input id="cpf" name="cpf" value="<?= $form->old('cpf') ?>" type="text">
      <?= $form->error('cpf') ?>

      <label for="phone">Telefone</label>
      <input id="phone" name="phone" value="<?= $form->old('phone') ?>" type="text">
      <?= $form->error('phone') ?>

      <label for="birthday">Data de Nascimento</label>
      <input id="birthday" name="birthday" value="<?= $form->old('birthday') ?>" type="date">
      <?= $form->error('birthday') ?>
    </fieldset>

    <fieldset>
      <legend>Doação</legend>

      <label for="payment_interval">Intervalo de doação</label>
      <select name="payment_interval" id="payment_interval">
        <option value="">Selecione</option>
        <option value="unique">Único</option>
        <option value="bimonthly">Bimestral</option>
        <option value="semi-annual">Semestral</option>
        <option value="annual">anual</option>
      </select>
      <?= $form->error('payment_interval') ?>

      <label for="value">Valor da doação</label>
      <input id="value" name="value" type="number">
      <?= $form->error('value') ?>

      <fieldset>
        <legend>Selecione a forma de pagamento</legend>
        <input type="radio" id="credit" value="credit" name="payment_type" onchange="toggleInput()">
        <label for="credit">Crédito</label>

        <input type="radio" id="debit" value="debit" name="payment_type" onchange="toggleInput()">
        <label for="debit">Débito</label>
      </fieldset>
      <?= $form->error('payment_type') ?>
      
      <div id="debit_field" style="display: none;">
        <label for="account">Número da Conta</label>
        <input id="account" name="account" type="number">
        <?= $form->error('account') ?>
      </div>

      <div id="credit_field" style="display: none;">
        <label for="first_card_numbers">Primeiros números do cartão</label>
        <input id="first_card_numbers" name="first_card_numbers" type="number">
        <?= $form->error('first_card_numbers') ?>
        
        <label for="last_card_numbers">Últimos números do cartão</label>
        <input id="last_card_numbers" name="last_card_numbers" type="number">
        <?= $form->error('last_card_numbers') ?>
      </div>
      <?= $form->error('credit_card') ?>
    </fieldset>

    <fieldset>
      <legend>Endereço</legend>

      <label for="street">Rua / Avenida</label>
      <input id="street" name="street" value="<?= $form->old('street') ?>" type="text">
      <?= $form->error('street') ?>

      <label for="address_number">Número</label>
      <input id="address_number" name="address_number" value="<?= $form->old('address_number') ?>" type="number">
      <?= $form->error('address_number') ?>

      <label for="neighborhood">Bairro</label>
      <input id="neighborhood" name="neighborhood" value="<?= $form->old('neighborhood') ?>" type="text">
      <?= $form->error('neighborhood') ?>

      <label for="state">Estado</label>
      <input id="state" name="state" value="<?= $form->old('state') ?>" type="text">
      <?= $form->error('state') ?>

      <label for="city">Cidade</label>
      <input id="city" name="city" value="<?= $form->old('city') ?>" type="text">
      <?= $form->error('city') ?>
    </fieldset>

    <button type="submit">Enviar</button>
  </form>

  <script src="/assets/js/form.js"></script>
</body>

</html>