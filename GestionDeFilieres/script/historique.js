$(document).ready(function () {
    $.ajax({
        url: 'controller/gestionHistorique.php',
        data: {op: ''},
        type: 'POST',
        success: function (data, textStatus, jqXHR) {
            remplir(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus);
        }
    });

    $('#submit').click(function () {
        var code_filiere = $("#codefiliere1").val();
        if ($('#submit').text() == 'Chercher') {


            $.ajax({
                url: 'controller/gestionHistorique.php',
                data: {op: 'change', code_filiere: code_filiere},
                type: 'POST',
                success: function (data, textStatus, jqXHR) {
                    remplir(data);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus);
                }
            });

        }

    });

    function remplir(data) {
        var contenu = $('#haha');
        var ligne = "";
        for (i = 0; i < data.length; i++) {
            ligne += '<tr><td>' + data[i].id + '</td>';
            ligne += '<td>' + data[i].nom + '</td>';
            ligne += '<td>' + data[i].code + '</td>';
        }
        contenu.html(ligne);
    }

});
