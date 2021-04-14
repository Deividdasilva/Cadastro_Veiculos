var url = "./../controllers/veiculo.controller.php";

$(document).ready(function() {
    Consultar();
  })

function Consultar() {
    $.ajax({
        data: { "accion": "CONSULTAR" },
        url: url,
        type: 'POST',
        dataType: 'json'
    }).done(function(response) {
        var html = "";
        $.each(response, function(index, data) {
            html += "<tr>";
            html += "<td>" + data.chassi + "</td>";
            html += "<td>" + data.marca + "</td>";
            html += "<td>" + data.modelo + "</td>";
            html += "<td>" + data.ano + "</td>";
            html += "<td>" + data.placa + "</td>";
            html += "<td>" + data.caracteristicas + "</td>";
            html += "<td>";
            html += "<button class='btn btn-warning' onclick='ConsultarPorId(" + data.idVeiculo + ");'><span class='fa fa-edit'></span> Editar</button>"
            html += "<button class='btn btn-danger' onclick='Deletar(" + data.idVeiculo + ");'><span class='fa fa-trash'></span> Deletar</button>"
            html += "</td>";
            html += "</tr>";
        });

        document.getElementById("dados").innerHTML = html;
        $('#tableVeiculos').DataTable();
    }).fail(function(response) {
        console.log(response);
    });
}

function ConsultarPorId(idVeiculo) {
    $.ajax({
        url: url,
        data: { "idVeiculo": idVeiculo, "accion": "CONSULTAR_ID" },
        type: 'POST',
        dataType: 'json'
    }).done(function(response) {
        document.getElementById('chassi').value = response.chassi;
        document.getElementById('marca').value = response.marca;
        document.getElementById('modelo').value = response.modelo;
        document.getElementById('ano').value = response.ano;
        document.getElementById('placa').value = response.placa;
        document.getElementById('caracteristicas').value = response.caracteristicas;
        document.getElementById('idVeiculo').value = response.idVeiculo;
        BloquearBotoes(false);
    }).fail(function(response) {
        console.log(response);
    });
}

function Salvar() {
    $.ajax({
        url: url,
        data: retornarDados("SALVAR"),
        type: 'POST',
        dataType: 'json'
    }).done(function(response) {
        if (response == "OK") {
            MostrarAlerta("Dados salvos com sucesso");
        } else {
            MostrarAlerta("Error!", response, "error");
        }
        Limpar();
        Consultar();
    }).fail(function(response) {
        console.log(response);
    });
}

function Editar() {
    $.ajax({
        url: url,
        data: retornarDados("EDITAR"),
        type: 'POST',
        dataType: 'json'
    }).done(function(response) {
        if (response == "OK") {
            MostrarAlerta("Dados atualizados com sucesso");
        } else {
            MostrarAlerta("Erro", response);
        }
        Limpar();
        Consultar();
    }).fail(function(response) {
        console.log(response);
    });
}

function Deletar(idVeiculo) {
    $.ajax({
        url: url,
        data: { "idVeiculo": idVeiculo, "accion": "DELETAR" },
        type: 'POST',
        dataType: 'json'
    }).done(function(response) {
        if (response == "OK") {
            MostrarAlerta("Dados deletados com sucesso");
        } else {
            MostrarAlerta("Erro", response);
        }
        Consultar();
    }).fail(function(response) {
        console.log(response);
    });
}

function Validar() {
    chassi = document.getElementById('chassi').value;
    marca = document.getElementById('marca').value;
    modelo = document.getElementById('modelo').value;
    ano = document.getElementById('ano').value;
    placa = document.getElementById('placa').value;
    caracteristicas = document.getElementById('caracteristicas').value;

    if (chassi == "" || marca == "" || modelo == "" ||
        ano == "" || placa == "" || caracteristicas == "") {
        return false;
    }
    return true;
}

function retornarDados(accion) {
    return {
        "chassi": document.getElementById('chassi').value,
        "marca": document.getElementById('marca').value,
        "modelo": document.getElementById('modelo').value,
        "ano": document.getElementById('ano').value,
        "placa": document.getElementById('placa').value,
        "caracteristicas": document.getElementById('caracteristicas').value,
        "accion": accion,
        "idVeiculo": document.getElementById("idVeiculo").value
    };
}

function Limpar() {
    document.getElementById('chassi').value = "";
    document.getElementById('marca').value = "";
    document.getElementById('modelo').value = "";
    document.getElementById('ano').value = "";
    document.getElementById('placa').value = "";
    document.getElementById('caracteristicas').value = "";
    BloquearBotoes(true);
}

function BloquearBotoes(salvar) {
    if (salvar) {
        document.getElementById('salvar').disabled = false;
        document.getElementById('editar').disabled = true;
    } else {
        document.getElementById('salvar').disabled = true;
        document.getElementById('editar').disabled = false;
    }
}

function MostrarAlerta(titulo, descripcion, tipoAlerta) {
    Swal.fire(
       titulo,
        descripcion,
        tipoAlerta
  );
}