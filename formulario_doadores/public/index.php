<?php
  use App\Services\FormHandler;

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

  <form method="post" action="submit.php">
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

      <label for="interval">Intervalo de doação</label>
      <select name="interval" id="interval">
        <option value="">Selecione</option>
        <option value="unique">Único</option>
        <option value="bimonthly">Bimestral</option>
        <option value="semi-annual">Semestral</option>
        <option value="annual">anual</option>
      </select>

      <label for="donation">Valor da doação</label>
      <input id="donation" name="donation" type="number">

      <fieldset>
        <legend>Selecione a forma de pagamento</legend>
        <input type="radio" id="credit" name="paymentMethod">
        <label for="credit">Crédito</label>

        <input type="radio" id="debit" name="paymentMethod">
        <label for="debit">Débito</label>
      </fieldset>
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
      
      <label for="city">Estado</label>
      <input id="city" name="city" value="<?= $form->old('city') ?>" type="text">
      <?= $form->error('city') ?>
    </fieldset>

    <button type="submit">Enviar</button>
  </form>
</body>

</html>
