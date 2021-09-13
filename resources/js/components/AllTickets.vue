<template>
<div>
    <Nav/>
    <div class="flex">
        <div v-for="(ticket, index) in tickets" :key="index">

            <div class="main">
                <h3>Bilieto id: {{ticket.id}}</h3>
                <div>
                    <p>Vardas : {{ticket.first_name}}</p>
                    <p>Pavarde : {{ticket.last_name}}</p>
                </div>
                <h3>Laikotarpis</h3>
                <div>
                    <p>Leidimo isdavimo data :  {{ticket.date}}</p>
                    <p>Leidimas galioja :  {{ticket.days}} diena(s)</p>
                    <p>Meskeriu skaicius: {{ticket.quantity}}</p>
                </div>
            </div>

        </div>
    </div>
</div>
</template>

<script>
import Nav from "./Nav";
export default {
    name: "AllTickets",
    data() {
        return {
            tickets: []
        }
    },
    components: {
        Nav
    },
    created() {
        fetch('http://127.0.0.1:8000/api/all')
        .then(res => res.json())
        .then (data => {
            this.tickets = data
        })
    }
}
</script>

<style scoped>
.flex {
    display: flex;
    flex-wrap: wrap;
    flex-direction: row;
    margin: 0 auto;
}
.main {
    background-color: steelblue;
    margin: 15px 30px;
    border: 1px solid #4b4a4a;
    border-radius: 20px;
    padding: 30px;
}
</style>
