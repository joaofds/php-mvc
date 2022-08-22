$(document).ready(function () {});

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

  const produto = {
    nome: $("#nome").val(),
    preco: $("#preco").val(),
    cor: $("#cor").val(),
  };

  if (!produto.nome == "") {
    $.ajax({
      url: "/produto/store",
      type: "POST",
      data: { produto: JSON.stringify(produto) },
      dataType: "json",
    }).done((window.location.href = "/produto"));
  } else {
    alert("Todos os campos são obrigatórios");
  }
});
