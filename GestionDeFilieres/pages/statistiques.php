<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['employe'])) {
    ?>

<div class="container-fluid" style="margin-top: 5%;">
    <div class="">
        <p class="h2 text-center text-dark text-uppercase font-weight-bold">Statistiques des Filieres & Classes</p>
        <hr class="line-seprate">
        <section class="statistic statistic2">
                <div class="container">
                    <div class="row">
                        <a href="./index.php?p=classe" class="col-md-6 col-lg-3" style="left: 190px;">
                            <div class="statistic__item statistic__item--green">
                                <h2 class="number">...</h2>
                                <span class="desc">Classes</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-accounts"></i>
                                </div>
                            </div>
                        </a>
                        <a href="./index.php?p=Filieree" class="col-md-6 col-lg-3" style="left: 300px;"  >

                            <div class="statistic__item statistic__item--orange">
                                <h2 class="number">...</h2>
                                <span class="desc">Filiere</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-group-work"></i>
                                </div>
                            </div>
                        </a>
<!--                        <a href="./index.php?p=pointage" class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--blue">
                                <h2 class="number">...</h2>
                                <span class="desc">pointages</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-check"></i>
                                </div>
                            </div>
                        </a>
                        <a href="./index.php?p=fonction" class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--red">
                                <h2 class="number">...</h2>
                                <span class="desc">fonctions</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-settings"></i>
                                </div>
                            </div>
                        </a>-->
<hr class="line-seprate" style="margin-bottom: 20px;">
<!--<div class="row" style="margin-left:200px;">   -->
<div class="row">
<canvas id="myChart" width="900" height="400"></canvas>
</div>



            </div>
                    </div>
                </div>
            </section>
    </div>
</div>


            <script>
                var ctx = document.getElementById('myChart').getContext('2d');
                $.ajax({
                    url: 'controller/gestionStatistique.php',
                    data: {op: ''},
                    type: 'POST',
                    success: function (data, textStatus, jqXHR) {
                        var x = Array();
                        var y = Array();
                        data.forEach(function (e) {
                            x.push(e.nom);
                            y.push(e.nbr);
                        });
                        showGraph(x, y);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus);
                    }
                });
                var haha = [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ];
                function showGraph(x, y) {
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: x,
                            datasets: [{
                                    data: y,
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(153, 102, 255, 0.2)',
                                        'rgba(255, 159, 64, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                        },
                        options: {
                            plugins: {
                                legend: {
                                    display: true,
                                    position: 'right',
                                    labels: {
                                        generateLabels: function (chart) {
                                            return chart.data.labels.map(function (label, i) {
                                                return {
                                                    text: label,
                                                    fillStyle: haha[i],
                                                };
                                            });
                                        }
                                    }
                                },
                                title: {
                                    display: true,
                                    text: 'Nombre de classes par filiere'
                                }
                            },
                            scales: {
                                y: {
                                    title: {
                                        display: true,
                                        text: 'Nombre de classes'
                                    }
                                },
                                x: {
                                    title: {
                                        display: true,
                                        text: 'Filieres'
                                    }
                                }
                            }
                        }
                    });
                }
            </script>


        </div>
        <?php
    } else {
        header("Location: ../index.php");
    }
    ?>