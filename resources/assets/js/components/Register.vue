<template>
        <div class="container">
            <div class="page_title row">
                <div class="col-2">
                    <a href="/"><span class="fa fa-arrow-left" aria-hidden="true"></span></a>
                </div>
                <div class="offset-2 col-4">
                    <h1 class="text-center">Sign up for free</h1>
                </div>
            </div>
            <div class="form_wrapper">
                <form action='/profile' method="post" id="registrationForm">
                   
                    
                    <div class="row">
                        <div class="col-md-8">
<<<<<<< HEAD
                            <input type="text" name="inputEmail" class="form-control-plaintext" id="inputEmail" placeholder="Email or username">
=======
                            <input type="text" name="inputEmail" class="form-control-plaintext" id="username" placeholder="Username*">
                        </div>
                        <div class="col-md-4">
                            <i class="fa fa-user icon_right" aria-hidden="true"></i>
                        </div>
                    </div>
                    <hr class="horisontal_line">
                     <div class="row">
                        <div class="col-md-8">
                            <input type="text" name="inputEmail" class="form-control-plaintext" id="email" placeholder="Email*">
>>>>>>> caf00ee88e84a917a4fecd2e02f7c1c275b938fe
                        </div>
                        <div class="col-md-4">
                            <i class="fa fa-envelope-open-o icon_right" aria-hidden="true"></i>
                        </div>
                    </div>
                    <hr class="horisontal_line">
                    <div class="row">
                        <div class="col-md-8">
<<<<<<< HEAD
                            <input type="password" name="inputPassword" class="form-control-plaintext" id="inputPassword" placeholder="Password">
=======
                            <input type="password" name="inputPassword" class="form-control-plaintext" id="password" placeholder="Password*">
                        </div>
                        <div class="col-md-4">
                            <i class="fa fa-key icon_right" aria-hidden="true"></i>
                        </div>
                    </div>
                    <hr class="horisontal_line">
                    <div class="row">
                        <div class="col-md-8">
                            <input type="password" name="inputPassword" class="form-control-plaintext" id="password" placeholder="Confirm Password*">
>>>>>>> caf00ee88e84a917a4fecd2e02f7c1c275b938fe
                        </div>
                        <div class="col-md-4">
                            <i class="fa fa-key icon_right" aria-hidden="true"></i>
                        </div>
                    </div>
                    <hr class="horisontal_line">
<<<<<<< HEAD
                    <div class="row">
                        <div class="col-md-8 label">
                            I am signing up as:
                        </div>
                    </div>
=======
>>>>>>> caf00ee88e84a917a4fecd2e02f7c1c275b938fe
                    <select name="registerType" class="form-control">
                        <option value="mr">Mentor</option>
                        <option value="me">Mentee</option>
                    </select> 
<<<<<<< HEAD
                    <div class="g-recaptcha" data-sitekey="6Les2T4UAAAAAKTY_F0SjXtjfgrDbc8lwKLpLaoG"></div>
                    <div>
                        <input type="submit" id="signUp" class="btn btn-light btn-block" href="/profile" value="Sign up"></a>
                    </div>                                              
=======
                    <hr class="horisontal_line">
                    <div class="g-recaptcha" data-sitekey="6Les2T4UAAAAAKTY_F0SjXtjfgrDbc8lwKLpLaoG"></div>
                    <br>
                    <input type="submit" id="signUp" class="btn btn-light btn-block" href="/profile" value="Sign up"/>
                                                                
>>>>>>> caf00ee88e84a917a4fecd2e02f7c1c275b938fe
                </form>
                <p class="register_text">Do you already have an account?<br>
                <a href="/register"><span class="login_label">Login here</span></a></p>
            </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            submits: function(){
                return view('profile')
            }
        }
    }
</script>
