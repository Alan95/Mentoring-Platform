<template>
        
    <div class="container">
            <vue-particles class="particles" color="#dedede"
            :particleOpacity="0.7"
            :particlesNumber="80"
            shapeType="circle"
            :particleSize="4"
            linesColor="#dedede"
            :linesWidth="1"
            :lineLinked="true"
            :lineOpacity="0.4"
            :linesDistance="150"
            :moveSpeed="3"
            :hoverEffect="true"
            hoverMode="grab"
            :clickEffect="true"
            clickMode="push"
          ></vue-particles>
        <div class="titlebox text-center">
            <h1 class="main-title">Mentor Me</h1>
            <p>The best platform</p>
            <div class="btn-group">
                <a class="btn btn-light btn-sm" href="/register">Login</a>
                <a class="btn btn-light btn-sm btn-violet" href="/register">Sign up</a>
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
