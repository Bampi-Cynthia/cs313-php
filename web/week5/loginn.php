<?php include $_SERVER['DOCUMENT_ROOT'] . 'header.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . 'nav.php'; ?>
<main>
    <h1 class="formtop">Sign In</h1>
    <?php
if (isset($message)) {
    echo $message;
}  
    ?>
    <form method="post" action="accounts">
        <fieldset>
        <span>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span><br>
        <label>E-mail Address</label>
        <input type="email" name="clientEmail" id="clientEmail" required <?php if(isset($clientEmail)){echo "value='$clientEmail'";} ?>><br>
        <label>Password</label>
        <input type="password" name="clientPassword" id="clientPassword" required <?php if(isset($clientPassword)){echo "value='$clientPassword'";} ?> pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br>
        <input class="btn" type="submit" value="Log In">
        <!-- Add the action key - value pair-->
        <input type="hidden" name="action" value="Login">
        </fieldset>
    </form>
    <h3 class="notice">Please Create a new account <a href="/acme/accounts/index.php?action=Naccount">Create a new account</a></h3>
    
</main>
<?php include $_SERVER['DOCUMENT_ROOT'] . 'footer.php'; ?>
