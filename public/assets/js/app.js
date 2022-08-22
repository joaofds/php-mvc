$(document).ready(function () {
  // tabela
  const tableProdutos = $("#produtos tr");
  // input de filto da tabela
  $("#filter-names").keyup(function () {
    // valor de input
    let input = $(this).val().toUpperCase();
    // seleciona tr da tabela
    tableProdutos.filter(function () {
      // traz somente valores encontrados
      $(this).toggle($(this).text().toUpperCase().indexOf(input) > -1);
    });
  });
});

// mascara para moeda
$(".moeda").inputmask({
  alias: "numeric",
  allowMinus: false,
  digits: 2,
  max: 999.99,
});

// submit formmulario de produto
$("#form-produto").submit(function (event) {
  event.preventDefault();

  // captura produto
  const produto = {
    nome: $("#nome").val(),
    preco: $("#preco").val(),
    cor: $("#cor").val(),
  };

  // ajax
  if (!produto.nome == "") {
    $.ajax({
      url: "/produto/store",
      type: "POST",
      data: { produto: JSON.stringify(produto) },
      dataType: "json",
    }).done(
      (alert("Produto cadastrado com sucesso."),
      (window.location.href = "/produto"))
    );
  } else {
    alert("Todos os campos são obrigatórios");
  }
});
