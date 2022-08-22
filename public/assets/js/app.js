// tabela
const tableProdutos = $("#produtos tr");

$(document).ready(function () {
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

$("#edit-produto").submit(function (e) {
  e.preventDefault();

  // captura produto
  const produto = {
    id: window.location.pathname.split("/").pop(),
    nome: $("#produto").val(),
    preco: $("#preco").val(),
  };

  // ajax
  if (!produto.nome == "") {
    $.ajax({
      url: "/produto/update",
      type: "POST",
      data: { produto: JSON.stringify(produto) },
      dataType: "json",
    }).done(
      (alert("Produto atualizado com sucesso."),
      (window.location.href = "/produto"))
    );
  } else {
    alert("Todos os campos são obrigatórios");
  }
});

// edição de produto
$("#produtos tr a").click(function () {
  let linkText = $(this).text();
  let id = $(this).closest("tr").attr("data");

  // editando produto
  if (linkText == "Editar") {
    location.replace(`produto/edit/${id}`);
  }

  // deletando produto
  if (linkText == "Deletar") {
    $.ajax({
      url: "/produto/delete",
      type: "POST",
      data: { id: id },
      dataType: "json",
    }).done(
      (alert("Produto deletado com sucesso."),
      (window.location.href = "/produto"))
    );
  }
});
