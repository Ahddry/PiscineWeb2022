<header>
    <div id="BarrePrincipale">
        <a href="Homepage.html"><img src="images/Decor/LogoOmnesSante2.png" alt="Omnes Santé" width="50px" height="50px"></a>
        <div id="Navigation">
            <form action="Homepage.html"><button type="submit">Accueil</button></form>
            <div id="MenuDeroulant">
                <button onclick="menuDeroulant()" class="boutounDeroulant">Tout Parcourir</button>
                <div id="Options" class="contenu">
                    <a href="#">Médecin généraliste</a>
                    <a href="#">Médecin spécialiste</a>
                    <a href="#">Laboratoire</a>
                </div>
            </div>
            <form action="Homepage.html"><button type="submit">Rendez-vous</button></form>
            <form action="Medecins.png"><button type="submit">Votre Compte</button></form>
        </div>
        <div id="BarreRecherche">
            <form id="search">
                <div id="Recherche">
                    <label>🔎<input type="text" autocomplete="off" placeholder="Nom, spécialité, ..."></label>
                    <button type="submit" id="SubmitRecherche">Rechercher</button>
                </div>
            </form>
        </div>
    </div>
</header>