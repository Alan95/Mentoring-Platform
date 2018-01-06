<template>
    <div class="container">
        <div class="titlebox text-center">
            <h1 class="main-title">Mentor Me Profile</h1>
            <p>The best platform</p>
        <div>
            Hello {{ user.username }}
        </div>
        </div>
    </div>
</template>

<script>
    import VueParticles from 'vue-particles'
    Vue.use(VueParticles)

    export default {
        mounted() {
            console.log('Component mounted.')
            this.getUser();
        },
        data(){
            return{
                user: {
                    username: '',
                    email: '',
                },
                errors: []
            }
        },
        methods: {
            getUser(){
                var self = this;
                axios.get('/api/user')
                .then(response => { 
                    self.user.username = response.data.username;
                    self.user.email = response.data.email;
                    self.user.registerType = response.data.registerType;
                })
                .catch(e => { 
                    self.errors.push(e)
                })
            }
        }
    }
</script>