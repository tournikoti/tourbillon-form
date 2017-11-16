<?php

use Tourbillon\Form\Form;
use Tourbillon\Request\HttpRequest;

require '../vendor/autoload.php';

$request = new HttpRequest();

$form = new Form();

$form
        ->add('prenom')
        ->add('nom')
        ->add('genre')
        ->add('vehicule')
        ->add('niveau')
        ->add('position')
    ;

$form->handleRequest($request);

if ($form->isValid()) {
    
}

?>

<form action="" method="post">

    <input type="text" name="prenom" placeholder="prenom" value="<?= $form->get('prenom')->getValue() ?>" /><br />
    <input type="text" name="nom" placeholder="nom" value="<?= $form->get('nom')->getValue() ?>" /><br />

    <br />

    <input type="radio" name="genre" value="male" checked> Male<br />
    <input type="radio" name="genre" value="female"> Female<br />
    <input type="radio" name="genre" value="other"> Other<br />

    <br />

    <input type="checkbox" name="vehicule[]" value="Bike" />Vélo<br />
    <input type="checkbox" name="vehicule[]" value="Car" />Voiture<br />

    <br />

    <select name="niveau">
        <option value="niveau1">Niveau 1</option>
        <option value="niveau2">Niveau 2</option>
    </select>
    
    <br />
    <br />

    <select name="position[]" multiple>
        <option value="gardien">Gardien</option>
        <option value="defenseur">Défenseur</option>
        <option value="milieu">Milieu</option>
        <option value="attaquant">Attaquant</option>
    </select> 
    
    <br />
    <br />
    
    <input type="submit" value="envoyer" />
</form>