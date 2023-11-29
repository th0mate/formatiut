<div id="center" class="antiPadding">
    <div class="wrapDroite">
        <form method="POST">
            <fieldset>
                <legend>Ajouter un étudiant :</legend>

                <label for="numEtudiant_id">Numéro étudiant</label> :
                <div class="inputCentre">
                    <input type="text" placeholder="22207651" name="numEtudiant"
                    id="numEtudiant_id" required/>
                </div>

                <label for="nom_id">Nom</label> :
                <div class="inputCentre">
                    <input type="text" placeholder="Smith" name="nom"
                           id="nom_id" required maxlength="32"/>
                </div class="inputCentre">

                <label for="prenom_id">Prénom</label> :
                <div class="inputCentre">
                    <input type="text" placeholder="John" name="prenom"
                           id="prenom_id" required maxlength="32"/>
                </div class="inputCentre">

                <label for="login_id">Login</label> :
                <div class="inputCentre">
                    <input type="text" placeholder="smithj" name="login"
                           id="login_id" required maxlength="32"/>
                </div class="inputCentre">

                <label for="mailUniversitaire_id">Mail universitaire</label> :
                <div class="inputCentre">
                    <input type="text" placeholder="john.smith@etu.umontpellier.fr" name="mailUniversitaire"
                           id="mailUniversitaire_id" required maxlength="50"/>
                </div class="inputCentre">

                <label for="groupe_id">Groupe de classe</label> :
                <div class="inputCentre">
                    <input type="text" placeholder="Q1" name="groupe"
                           id="groupe_id" required maxlength="2"/>
                </div class="inputCentre">

                <label for="parcours_id">Parcours du BUT</label> :
                <div class="inputCentre">
                    <input type="text" placeholder="RACDV" name="parcours"
                           id="parcours_id" required maxlength="5"/>
                </div class="inputCentre">

                <div class="boutonsForm">
                    <input type="submit" value="Envoyer" formaction="?action=ajouterEtudiant&controleur=AdminMain"/>
                </div>
            </fieldset>
        </form>
    </div>
</div>
