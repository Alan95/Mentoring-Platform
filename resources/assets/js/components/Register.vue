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
                <div class="row">
                    <div class="col-md-8">
                        <input type="text" class="form-control-plaintext" v-model="user.username" placeholder="Username*">
                    </div>
                    <div class="col-md-4">
                        <i class="fa fa-user icon_right" aria-hidden="true"></i>
                    </div>
                </div>
                <hr class="horisontal_line">
                    <div class="row">
                    <div class="col-md-8">
                        <input type="email" v-model="user.email" class="form-control-plaintext" placeholder="Email*">
                    </div>
                    <div class="col-md-4">
                        <i class="fa fa-envelope-open-o icon_right" aria-hidden="true"></i>
                    </div>
                </div>
                <hr class="horisontal_line">
                <div class="row">
                    <div class="col-md-8">
                        <input type="password" class="form-control-plaintext" v-model="user.password" placeholder="Password*">
                    </div>
                    <div class="col-md-4">
                        <i class="fa fa-key icon_right" aria-hidden="true"></i>
                    </div>
                </div>
                <hr class="horisontal_line">
                <div class="row">
                    <div class="col-md-8">
                        <input type="password" v-model="user.confirmedPassword" class="form-control-plaintext" placeholder="Confirm Password*">
                    </div>
                    <div class="col-md-4">
                        <i class="fa fa-key icon_right" aria-hidden="true"></i>
                    </div>
                </div>
                <hr class="horisontal_line">
                <select v-model="user.registerType" class="form-control">
                    <option value="mentor">Mentor</option>
                    <option value="mentee">Mentee</option>
                </select> 
                <div class="g-recaptcha" data-sitekey="6Les2T4UAAAAAKTY_F0SjXtjfgrDbc8lwKLpLaoG"></div>
                <br>
                <input @click="registerUser" id="signUp" class="btn btn-light btn-block" value="Sign up"/>
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
        data(){
            return{
                user: {
                    username: '',
                    email: '',
                    password: '',
                    confirmedPassword: '',
                    registerType: ''
                },
                errors: []
            }
        },
        methods: {
            registerUser(){
                var self = this;
                if(self.user.password == self.user.confirmedPassword){
                    axios.post(`/api/register`, {
                        username: self.user.username,
                        email: self.user.email,
                        password: self.user.password,
                        registerType: self.user.registerType
                    })
                    .then(response => {
                        self.changeSiteTo('/profile');
                    })
                    .catch(e => {
                        self.errors.push(e)
                    })        
                } else {
                    alert('Password not same');
                }
            },
            changePath(path){
                document.location.href = location.protocol + '//' + location.host + path
            }
        }
    }
</script>
