<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro de doadores</title>
</head>

<body>
  <h1>Cadastro de doadores</h1>

  <form action="">
    <fieldset>
      <legend>Dados pessoais</legend>

      <label for="name">Nome</label>
      <input id="name" name="name" type="text">

      <label for="email">Email</label>
      <input id="email" name="email" type="email">

      <label for="cpf">CPF</label>
      <input id="cpf" name="cpf" type="text">

      <label for="phone">Telefone</label>
      <input id="phone" name="phone" type="text">

      <label for="birthday">Data de Nascimento</label>
      <input id="birthday" name="birthday" type="date">
    </fieldset>

    <fieldset>
      <legend>Doação</legend>

      <label for="interval">Intervalo de doação</label>
      <select name="interval" id="interval">
        <option value="">Selecione</option>
        <option value="unique">Único</option>
        <option value="bimestral">Bimestral</option>
        <option value="semestral">Semestral</option>
        <option value="anual">anual</option>
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
      <input id="street" name="street" type="text">
      
      <label for="addressNumber">Número</label>
      <input id="addressNumber" name="addressNumber" type="number">
      
      <label for="neighborhood">Bairro</label>
      <input id="neighborhood" name="neighborhood" type="text">

      <label for="state">Estado</label>
      <input id="state" name="state" type="text">
      
      <label for="city">Estado</label>
      <input id="city" name="city" type="text">
    </fieldset>
  </form>
</body>

</html>