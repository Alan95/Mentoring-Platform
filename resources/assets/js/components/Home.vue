<template>
    <div class="container">
        <vue-particles class="particles" color="#dedede" :particleOpacity="0.7" :particlesNumber="80" shapeType="circle" :particleSize="4" linesColor="#dedede" :linesWidth="1" :lineLinked="true" :lineOpacity="0.4" :linesDistance="150" :moveSpeed="3" :hoverEffect="true" hoverMode="grab" :clickEffect="true" clickMode="push"></vue-particles>
        <div class="titlebox text-center">
            <h1 class="main-title">Mentor Me</h1>
            <p>The global mentoring platform.</p>
            <div class="btn-group">
                <a class="btn btn-light btn-sm" href="/login">Login</a>
                <a class="btn btn-light btn-sm btn-violet-main" @click="showCard = !showCard">Sign up</a>
            </div>
            <transition name="slide-fade">
                <div class="card" v-if="showCard">
                    <div class="card-body">
                        <h5 class="card-title">I'm a ...</h5>    
                        <div class="row">
                            <div class="col-6 border-line-left">
                                <img v-bind:src="'images/' + mentorLink" class="mentorimage"/>
                                <br>
                                <a href="register" class="btn btn-violet btn-xs">Mentor</a>
                            </div>
                            <div class="col-6 border-line-right">
                                <img v-bind:src="'images/' + menteeLink" class="mentorimage"/>
                                <br>
                                <a href="/register" class="btn btn-violet btn-xs">Mentee</a>
                            </div>    
                        </div>    
                    </div>    
                </div>
            </transition>
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
        data() {
            return{
                showCard: false,
                mentorLink: 'mentor.jpg',
                menteeLink: 'mentee.jpg'
            }
        },
        methods: {

        }
    }
</script>
