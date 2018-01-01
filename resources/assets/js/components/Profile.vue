<template>
    <div class="container">
        <div class="titlebox text-center">
            <h1 class="main-title">Mentor Me Profile</h1>
            <p>The best platform</p>
        <div>
            Hello, {{ $registerType }}, {{ $email }}
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
        },
        methods: {
            
        }
    }
</script>