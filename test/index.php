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

$form->initialize([
    'nom' => 'test',
    'position' => [
        'defenseur',
        'attaquant'
    ]
]);

$form->handleRequest($request);

if ($request->getMethod() == "POST") {
    var_dump($form->getData());
}

?>

<form action="" method="post">

    <input type="text" name="prenom" placeholder="prenom" value="<?= $form->get('prenom')->getValue() ?>" /><br />
    <input type="text" name="nom" placeholder="nom" value="<?= $form->get('nom')->getValue() ?>" /><br />

    <br />

    <input type="radio" name="genre" value="male" <?= $form->get('genre')->isChecked('male') ? 'checked' : '' ?>> Male<br />
    <input type="radio" name="genre" value="female" <?= $form->get('genre')->isChecked('female') ? 'checked' : '' ?>> Female<br />
    <input type="radio" name="genre" value="other" <?= $form->get('genre')->isChecked('other') ? 'checked' : '' ?>> Other<br />

    <br />

    <input type="checkbox" name="vehicule[]" value="Bike" <?= $form->get('vehicule')->isChecked('Bike') ? 'checked' : '' ?> />Vélo<br />
    <input type="checkbox" name="vehicule[]" value="Car" <?= $form->get('vehicule')->isChecked('Car') ? 'checked' : '' ?> />Voiture<br />

    <br />

    <select name="niveau">
        <option value="niveau1" <?= $form->get('niveau')->isChecked('niveau1') ? 'selected' : '' ?>>Niveau 1</option>
        <option value="niveau2" <?= $form->get('niveau')->isChecked('niveau2') ? 'selected' : '' ?>>Niveau 2</option>
    </select>
    
    <br />
    <br />

    <select name="position[]" multiple>
        <option value="gardien" <?= $form->get('position')->isChecked('gardien') ? 'selected' : '' ?>>Gardien</option>
        <option value="defenseur" <?= $form->get('position')->isChecked('defenseur') ? 'selected' : '' ?>>Défenseur</option>
        <option value="milieu" <?= $form->get('position')->isChecked('milieu') ? 'selected' : '' ?>>Milieu</option>
        <option value="attaquant" <?= $form->get('position')->isChecked('attaquant') ? 'selected' : '' ?>>Attaquant</option>
    </select> 
    
    <br />
    <br />
    
    <input type="submit" value="envoyer" />
</form>
