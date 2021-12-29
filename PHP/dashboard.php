<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<header>
    <h1>DashBoard App La Rehab</h1>
</header>
<main>
    <form action="traitement/ajoutCategorie.php" method="post" enctype="multipart/form-data">
        <label for="titreCategorie" id="labelTitreCategorie">Titre</label>
        <div id="divInputCategorie">
            <input type="text" name="titreCategorie" id="titreCategorie" required="required">
            <button type="submit">Ajouter Catégorie</button>
        </div>
    </form>
    <div class="divThemeExercice">
        <fieldset class="classThemeExercice">
            <legend>Ajout thème</legend>
            <form action="traitement/ajoutTheme.php" method="post" enctype="multipart/form-data">
                <div class="divInputLabel">
                    <label for="titreTheme">Titre</label>
                    <input type="text" name="titreTheme" id="titreTheme"required="required">
                </div>
                <div class="divInputLabel">
                    <label for="dropCategorie">Catégorie</label>
                    <select name="dropCategorie" id="dropCategorie">
                        <option value="Créativité">Créativité</option>
                        <option value="Cognition">Cognition</option>
                        <option value="Sport">Sport</option>
                    </select>
                </div>
                <button type="submit">Ajouter Thème</button>
            </form>
        </fieldset>
        <fieldset class="classThemeExercice">
            <legend>Ajout Exercice</legend>
            <form action="traitement/ajoutExercice.php" method="post" enctype="multipart/form-data">
                <div class="divInputLabel">
                    <label for="titreExercice">Titre</label>
                    <input type="text" name="titreExercice" id="titreExercice" required="required">
                </div>
                <div class="divInputLabel">
                    <label for="dropExercice">Catégorie</label>
                    <select name="dropExercice" id="dropExercice">
                        <option value="Renforcement">Renforcement</option>
                        <option value="Etirements">Etirements</option>
                        <option value="Liens/Vidéos">Liens/Vidéos</option>
                    </select>
                </div>
                <button type="submit">Ajouter Exercice</button>
            </form>
        </fieldset>
    </div>
    <div class="divThemeExercice">
    <fieldset class="classThemeExercice">
        <legend>Ajout Item</legend>
        <form>
            <div id="divRadioAjout">
                <div class="classRadio">
                    <input type="radio" name="typeFichier" id="texteRadio" value="Texte" class="widthNormal" required="required">
                    <label for="texteRadio" class="widthNormal">Texte</label>
                </div>
                <div class="classRadio">
                    <input type="radio" name="typeFichier" id="lienRadio" value="Lien" class="widthNormal" required="required">
                    <label for="lienRadio" class="widthNormal">Lien</label>
            </div>
                <div class="classRadio">
                    <input type="radio" name="typeFichier" id="imageRadio" value="Image" class="widthNormal" required="required">
                    <label for="imageRadio" class="widthNormal">Image</label>
            </div>
            </div>
            <div class="divInputLabel">
                <label for="lienItem">Lien</label>
                <input type="text" name="lienItem" id="lienItem">
            </div>
            <div class="divInputLabel hidden">
                <label for="textItem">Texte</label>
                <textarea name="textItem" id="textItem"></textarea>
            </div>
            <div class="divInputLabel hidden">
                <label for="imageItem">Image</label>
                <input type="file" name="imageItem" id="imageItem" accept="image/jpeg">
                <label for="dropExercice">Catégorie</label>
                <select name="dropExercice" id="dropExercice">
                    <option value="Séance1">Séance1</option>
                    <option value="Séance2">Séance2</option>
                    <option value="Séance3">Séance3</option>
                </select>
            </div>
            <button type="submit">Ajouter Item</button>
        </form>
    </fieldset>
    <fieldset class="classThemeExercice">
        <legend>Supprimer</legend>
        <form action="traitement/suppr.php" method="post" enctype="multipart/form-data">
            <div id="divRadioSuppr">
                <div class="classRadio">
                    <input type="radio" name="typeSuppr" id="categorieRadio" value="Categorie" class="widthNormal" required="required">
                    <label for="categorieRadio" class="widthNormal">Catégorie</label>
                </div>
                <div class="classRadio">
                    <input type="radio" name="typeSuppr" id="themeRadio" value="Theme" class="widthNormal" required="required">
                    <label for="themeRadio" class="widthNormal">Thème</label>
                </div>
                <div class="classRadio">
                    <input type="radio" name="typeSuppr" id="exerciceRadio" value="Exercice" class="widthNormal" required="required">
                    <label for="exerciceRadio" class="widthNormal">Exercice</label>
                </div>
            </div>
            <select name="dropSuppr" id="dropSuppr" class="widthNormal">
                <option value="Séance1">Séance1</option>
                <option value="Séance2">Séance2</option>
                <option value="Séance3">Séance3</option>
            </select>
            <button type="submit">Supprimer élément</button>
        </form>
    </fieldset>
    </div>
</main>
</body>
</html>
