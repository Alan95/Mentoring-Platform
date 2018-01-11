<template>
    <div class="container">
        <div class="page_title row">
            <div class="col-2">
                <a href="/"><span class="fa fa-arrow-left" aria-hidden="true"></span></a>
            </div>
            <div class="offset-2 col-4">
                <h1 class="text-center">Please, log in</h1>
            </div>
        </div>
        <div class="form_wrapper">
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
            <br>
            <input @click="doLogin" id="signIn" class="btn btn-light btn-block" value="Sign in"/>
            <p class="register_text">Don´t have an account yet?<br>
            <a href="/register"><span class="login_label">Register here</span></a></p>
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
                    email: '',
                    password: '',
                    registerType:'',
                },
                errors: []
            }
        },
        methods: {
            doLogin(){
                var self = this;
                if(self.user.password !== ''){
                    console.log(self.user.password)
                    console.log(self.user.email)
                    axios.post(`/api/login`, {
                        email: self.user.email,
                        password: self.user.password,
                    })
                    .then(response => {
                        self.changePath('/profile');
                    })
                    .catch(e => {
                        alert('Error!')
                        self.errors.push(e)
                    })        
                } else {
                    alert('Username and password dont match');
                }
            },
            changePath(path){
                document.location.href = location.protocol + '//' + location.host + path
            }
        }
    }
</script>