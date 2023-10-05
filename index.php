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
            <input type="submit" value="Wyślij zamówienie" id="wyslij"/>
    </form>
</section>
    <section class="wynik">
        <?php
        if($_SERVER['REQUEST_METHOD']=='POST') {
            $paczkow = $_POST['paczki'];
            $drozdzowek = $_POST['drozdzowki'];
            $bulki = $_POST['bulki'];
            $suma=0;
            $paczkow!=null?$suma += 0.99 * $paczkow:null;
            $drozdzowek!=null?$suma += 2.59 * $drozdzowek:null;
            $bulki!=null?$suma += 0.69 * $bulki:null;

            echo <<<END

	<h2>Podsumowanie zamówienia</h2>
	
	<table border="1" cellpadding="10" cellspacing="0">
	<tr>
		<td>Pączek (0.99PLN/szt)</td> <td>$paczkow</td>
	</tr>
	<tr>
		<td>Drożdzówka z budyniem (2.59PLN/szt)</td> <td>$drozdzowek</td>
	</tr>
	<tr>
		<td>Bułka grahamka (0.69PLN/szt)</td> <td>$bulki</td>
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