<?php
/**
 * @title: "intranetConnection" PHP View component
 * @description: Block de connexion pour les utilisateurs de l'intranet ADM
 */
?>

<div class="intranetConnection <?php echo $classElement ?>">
    <h1 class="intranetConnection_title">INTRANET</h1>
    <form class="intranetConnection_form" id="intranetConnection_form">
        <input class="intranetConnection_input intranetConnection_input-login"
               title="login" type="text" name="login" placeholder="login">
        <input class="intranetConnection_input intranetConnection_input-password"
               title="password" type="text" name="password" placeholder="password">
    </form>
    <button class="intranetConnection_button"
            type="submit" value="ok" form="intranetConnection_form">OK</button>
</div>
