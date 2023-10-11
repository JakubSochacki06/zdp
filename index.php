<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Piekarnia</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<section class="zamowienie">
    <h1 id="naglowek">Piekarnia Jakub Sochacki</h1>
    <form action="index.php" method="post">
        <div id="produkty">
            <div id="drozdzowka">
                <img src="https://www.kwestiasmaku.com/sites/v123.kwestiasmaku.com/files/drozdzowki-z-budyniem-00.jpg" alt="Drożdzówka z budyniem" height="150px" width="150px">
                <h2>Ilość drożdzówek z budyniem (2.59 PLN/szt):</h2>
                <input type="text" name="drozdzowki" />
            </div>
            <div id="paczek">
                <img src="https://d3iamf8ydd24h9.cloudfront.net/pictures/articles/2019/02/194829-v-1000x1000.jpg" alt="pączek" height="150px" width="150px">
                <h2>Ilość pączków (0.99 PLN/szt):</h2>
                <input type="text" name="paczki"/>
            </div>
            <div id="bulka">
                <img src="https://d-art.ppstatic.pl/kadry/k/r/1/a4/76/5e21bd86e03e7_o_original.jpg" alt="bulka" height="150px" width="150px">
                <h2>Ilość bułek grahamek (0.69 PLN/szt):</h2>
                <input type="text" name="bulki"/>
            </div>
        </div>
        <div id="wiek">
            <h2>Podaj swój wiek:</h2>
            <input type="number" name="wiek"/>
        </div>
            <input type="submit" value="Wyślij zamówienie" id="wyslij"/>
    </form>
</section>
    <section class="wynik">
        <?php
        if($_SERVER['REQUEST_METHOD']=='POST') {
            $paczkow = $_POST['paczki']==null?0:$_POST['paczki'];
            $drozdzowek = $_POST['drozdzowki']==null?0:$_POST['drozdzowki'];
            $bulek = $_POST['bulki']==null?0:$_POST['bulki'];
            if($_POST['wiek']==null || $_POST['wiek'] < 18){
                echo '<script>alert("Nie masz ukończonych 18 lat!")</script>';
                return;
            }

            $suma= 0.99 * $paczkow + 2.59 * $drozdzowek + 0.69 * $bulek;

//            Promocja co trzeci paczek darmowy
            $iloscDarmowychPaczkow = floor($paczkow/3);
            $sumaDarmowychPaczkow = $iloscDarmowychPaczkow * 0.99;
            $suma -= $sumaDarmowychPaczkow;

            function sprawdzCzyPierwsza($num)
            {
                if ($num == 1)
                    return false;
                for ($i = 2; $i <= $num/2; $i++)
                {
                    if ($num % $i == 0)
                        return false;
                }
                return true;
            }
            $znizkaMatematyczna=0;
            if(sprawdzCzyPierwsza($paczkow+$drozdzowek+$bulek)){
                $znikaMatematyczna = 0.1*$suma;
                $suma-=$znizkaMatematyczna;
            }
            echo <<<END

	<h2>Podsumowanie zamówienia</h2>
	
	<table border="1" cellpadding="10" cellspacing="0">
	<tr>
		<td>Drożdzówka z budyniem (2.59PLN/szt)</td> <td>ilość: $drozdzowek</td> <td><img src="https://www.kwestiasmaku.com/sites/v123.kwestiasmaku.com/files/drozdzowki-z-budyniem-00.jpg" alt="Drożdzówka z budyniem" height="100px" width="100px"></td>
	</tr>
	<tr>
		<td>Pączek (0.99PLN/szt)</td> <td>ilość: $paczkow</td> <td><img src="https://d3iamf8ydd24h9.cloudfront.net/pictures/articles/2019/02/194829-v-1000x1000.jpg" alt="pączek" height="100px" width="100px"></td>
	</tr>
	<tr>
		<td>Bułka grahamka (0.69PLN/szt)</td> <td>ilość: $bulek</td> <td><img src="https://d-art.ppstatic.pl/kadry/k/r/1/a4/76/5e21bd86e03e7_o_original.jpg" alt="bulka" height="100px" width="100px"></td>
	</tr>
	<tr>
		<td>Promocja co trzeci pączek darmowy!<br> Ilość darmowych pączków: $iloscDarmowychPaczkow</td> <td>Rabat: -$sumaDarmowychPaczkow</td> <td><img src="https://dijf55il5e0d1.cloudfront.net/images/rr/1/4/4/14409_1000.jpg" alt="rabat" height="100px" width="100px"></td>
	</tr>
	<tr>
		<td>Promocja matematyczna!<br> Jeśli ilość zamówień jest liczbą pierwszą otrzymujesz rabat -10%</td> <td>Rabat: -$znizkaMatematyczna</td> <td><img src="https://dijf55il5e0d1.cloudfront.net/images/rr/1/4/4/14409_1000.jpg" alt="rabat" height="100px" width="100px"></td>
	</tr>
	<tr>
		<td>SUMA</td> <td>$suma PLN</td>
	</tr>	
	</table>
	<br /><a href="index.php">Powrót do strony głównej</a>

END;
        }
        ?>
    </section>
</body>
</html>