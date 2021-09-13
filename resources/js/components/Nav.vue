<template>
    <div class="menu">
        <div class="flex">
            <p @click="home">Pagrindinis</p>
            <p @click="all">Visi bilietai</p>
        </div>
    </div>
</template>

<script>
export default {
    name: "Nav",
    methods: {
        home() {
            this.$router.push('/')
        },
        all(){
            this.$router.push('/all')
        }
    }
}
</script>


<style scoped>
.menu {
    background-image: url('https://www.weizmann.ac.il/WeizmannCompass/sites/WeizmannCompass/files/styles/main_image/public/compass_water_952x460px.jpg?itok=yyYkx34J');
    padding: 30px;
    text-align: center;
}
.flex {
    display: flex;
    justify-content: center;
}
.menu p {
    color: white;
    cursor: pointer;
    font-size: 20px;
    font-weight: bold;
    padding: 0 30px;
}
.menu p:hover {
    color: black;
}
</style>
