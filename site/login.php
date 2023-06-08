<!DOCTYPE html>
<html lang="en">

<head>
    <title>login Page</title>
</head>

<body>
    <?php
    include('header.php');
    ?>
    <section id="content">
        <div class="container_img">
            <div class="container">
                <div class="container_width">
                    <section class="form_align">
                        <!-- action and method are atributes -->
                        <!-- action en method zijn atributen -->
                        <form action="session_login.php" method="post">
                            <div>
                                <h2 class="form_head">Inloggen</h2>
                            </div>
                            <div>
                                <?php if (isset($_GET['error'])) { ?>
                                    <p class="error"><?php echo $_GET['error']; ?></p>
                                <?php } ?>
                            </div>
                            <div class="form_group">
                                <label for="email">Email-address</label>
                                <input type="text" id="email" name="email" placeholder="email-address ">
                            </div>
                            <div class="form_group">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" placeholder="password">
                            </div>
                            <div>
                                <a href="signUp.php" class="form_content_switch">I don't have an account</a>
                                <button class="button_submit" type="sumbit">log in</button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </section>
    <?php
    include('footer.php');
    ?>
</body>

</html>