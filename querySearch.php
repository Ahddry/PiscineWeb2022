<?php include 'Recherche.php' ?>
<?php
include_once 'const.php';
if(isset($_POST["search"]) && $_POST["search"] != "")
{
    global $mysqlConnection;
    $temp = explode(" ", $_POST["search"]);
    //recherche dans les medecins
    if(sizeof($temp) > 1)
    {
        $sql ="SELECT DISTINCT * FROM Medecin JOIN Plage_horraire ON Medecin.ID = Plage_horraire.ID_Medecin WHERE LOWER(Prenom) LIKE '%".$temp[0]."%' OR LOWER(Nom) LIKE '%". $temp[1] ."%' OR LOWER(Prenom) LIKE '%" . $temp[1] . "%' OR LOWER(Nom) LIKE '%" . $temp[0] . "%';";
    }
    else
    {
        $sql ="SELECT DISTINCT * FROM Medecin JOIN Plage_horraire ON Medecin.ID = Plage_horraire.ID_Medecin WHERE LOWER(Prenom) LIKE '%".$temp[0]."%' OR LOWER(Nom) LIKE '%". $temp[0] ."%' OR LOWER(Prenom) LIKE '%" . $temp[0] . "%' OR LOWER(Nom) LIKE '%" . $temp[0] . "%';";
    }
    $memberStatement = $mysqlConnection->prepare($sql);
    $memberStatement->execute();
    $resultM = $memberStatement->fetchAll();
    //recherche dans les services
    $sql = "SELECT Nom,Info,Regles FROM Service WHERE LOWER(Nom) LIKE '%" . $_POST["search"] . "%';";
    $memberStatement = $mysqlConnection->prepare($sql);
    $memberStatement->execute();
    $resultS = $memberStatement->fetchAll();
    echo("<br>");
    echo("<h2>Sercives</h2>");
    foreach($resultS as $res)
    {
        echo('<div class="SousBoites" style="text-align:left!important">');
        echo("<h4>".$res["Nom"] . "</h4><br> " . str_replace("\n", "<br>", $res["Info"]) . "<br><br>". str_replace("\n", "<br>", $res["Regles"]) . "<br/><br/><br/><br/>");
        echo('</div><br>');
    }
    echo("<br>");
    echo("<h2>Médecins</h2>");
    foreach($resultM as $res)
    {
        echo('<div class="SousBoites" style="text-align:left!important">');
        echo("<h4>".$res["Prenom"] . " " . $res["Nom"] . "</h4><br> " . $res["Localisation"] . " <br>" . $res["Telephone"] . "<br> ". $res["Mail"] . "<br> " . " <img src='" . $res["pp"] . "'> "."<br/><br/><br/><br/>");
        echo('</div><br>');
    }
}
else
{
    die;
}
echo("</p></div> </section> </div> </body> </html>")


///tu peux faire le front ici pour l'affichage des recherches on aura les variables du dessus pour afficher les résultats
?>