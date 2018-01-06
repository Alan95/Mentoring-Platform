<template>
    <div class="jumbotron">
        <h2>Search for a </h2>
        <input class="col-5"/>
        <button>Search</button>
        <br>
        <ul class="list-group">
            <li class="list-group-item">Cras justo odio</li>
            <li class="list-group-item">Dapibus ac facilisis in</li>
            <li class="list-group-item">Morbi leo risus</li>
            <li class="list-group-item">Porta ac consectetur ac</li>
            <li class="list-group-item">Vestibulum at eros</li>
        </ul>
    </div>        
</template>
<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return{
                showCard: false
            }
        },
        methods: {
        }
    }
</script>    
