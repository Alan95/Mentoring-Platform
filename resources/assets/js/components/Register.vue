<template>
        <div class="container">
        <!--<div class="page_title">
            <h1>Sign up for free</h1>
        </div>-->
        <div class="form_wrapper">
            <form>
                <input type="text" class="form-control-plaintext" id="staticEmail" placeholder="Email or username">    
                <span><i class="fa fa-envelope-open-o icon_right" aria-hidden="true"></i></span>  
                <hr class="horisontal_line">
                <input type="password" class="form-control-plaintext" id="inputPassword" placeholder="Password">
                <i class="fa fa-key icon_right" aria-hidden="true"></i>
                <hr class="horisontal_line"> 
                <a class="btn btn-light btn-block sign_up" href="/register">Sign up</a>         
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
        }
    }
</script>
