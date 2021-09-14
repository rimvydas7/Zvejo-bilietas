<template>
    <div class="menu">
        <div class="flex">
            <p @click="home">Pagrindinis</p>
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
    }
}
</script>


<style scoped>
.menu {
    background-color: rgba(40, 102, 6, 0.85);
    padding: 5px;
    text-align: center;
}
.flex {
    justify-content: flex-start;
}
.menu p {
    color: black;
    cursor: pointer;
    font-size: 20px;
    font-weight: bold;
    padding: 0 30px;
}
.menu p:hover {
    color: white;
}
</style>
