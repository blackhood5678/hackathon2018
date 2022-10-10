<?php
    session_start();
    include('connect.php');
    include './includes/header.php';
?>
<style type="text/css">
    body{
        background-color: #000 !important;
    }
</style>
<canvas id="field">
    </canvas>
        <div class="container" style="margin-top: -45%;">
            <section>				
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="login.php" autocomplete="on" method="post"> 
                                <h1>Log in</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > Your username: </label>
                                    <input id="username" name="user" required="required" type="text" placeholder="Username"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Your password:</label>
                                    <input id="password" name="pass" required="required" type="password" placeholder="A-Z, at least 6 symbols" /> 
                                </p>
                                <p class="login button"> 
                                    <input type="submit" value="Login" /> 
								</p>
                                <p class="change_link">
									<a href="#toregister" class="to_register" id=join_us>Join us</a>
								</p>
                            </form>
                        </div>

                        <div id="register" class="animate form">
                            <form  action="signup.php" autocomplete="on" method="post"> 
                                <h1> Sign up </h1> 
                                <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">Your username:</label>
                                    <input id="usernamesignup" name="user" required="required" type="text" placeholder="Username" />
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="pass" data-icon="p">Your password: </label>
                                    <input id="passwordsignup" name="pass" required="required" type="password" placeholder="A-Z, at least 6 symbols"/>
                                </p>
                                <p> 
                                    <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Please confirm your password: </label>
                                    <input id="passwordsignup_confirm" name="pass_confirm" required="required" type="password" placeholder="A-Z, at least 6 symbols"/>
                                </p>
                                <p> 
                                    <input type="hidden" name="race" value="1">
                                </p>
                                <p class="signin button"> 
									<input type="submit" value="Sign up"/> 
								</p>
                                <p class="change_link">  
									
									<a href="#tologin" class="to_register"> Go and log in </a>
								</p>
                            </form>
                        </div>
						
                    </div>
                </div>  
            </section>
        </div>
        <script type="text/javascript" src="./js/login_stars.js"></script>
<?php include'./includes/footer.php'; ?> 