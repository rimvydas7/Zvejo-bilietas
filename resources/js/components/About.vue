<template>
    <div>
        <Nav/>
        <div class="main">
            <h1>Molėtų regiono žvejo bilieto patvirtinimas</h1>
            <h2>Žvejo mėgėjo bilietas</h2>
            <h3>Žvejo duomenys :</h3>

            <div>
                <p>Vardas : {{this.tickets.first_name}}</p>
                <p>Pavarde : {{this.tickets.last_name}}</p>
            </div>
            <h3>Laikotarpis</h3>
            <div>
                <p>Leidimo isdavimo data :  {{this.tickets.updated_at.replace('.000000Z', '')}}</p>
                <p>Leidimas galioja :  {{this.tickets.days}} diena(s)</p>
                <p>Meskeriu skaicius: {{this.tickets.quantity}}</p>
            </div>
            <h2>Pasirinkti ežerai : </h2>

            <div v-for="(lake, index) in lakes" :key="index">
                <div v-if="lake.id === assignedLakes.lake_id">
                    <div class="lake">{{lake.name}}</div>
                </div>
            </div>

            <h3>Leidimo kaina - {{this.tickets.price}} Eur</h3>
        </div>
    </div>
</template>

<script>

import Nav from "./Nav";

export default {

    name: "ExampleComponent",
    components: {
        Nav,
    },
    data () {
        return {
            arr: {},
            tickets: [],
            assignedLakes: {},
            lakes: {}
        }

    },
    created () {
        this.get()
        this.assigned()
        fetch("http://127.0.0.1:8000/api/lakes")
            .then((res) => res.json())
            .then((data) => {
                this.lakes = data
            })
    },

    methods: {
        assigned() {
            fetch('http://127.0.0.1:8000/api/assigned/' + this.tickets.id)
                .then(res => res.json())
                .then(data => {
                    this.assignedLakes = data
                })
        },

        get() {
            fetch("http://127.0.0.1:8000/api/ticket/" + this.$route.params.link)
                .then(res => res.json())
                .then(data => {
                        this.tickets = data
                }
                );
        }
    }
}

</script>

<style scoped>

.main {
    background-color: steelblue;
    width: 50%;
    margin: 30px auto;
    border: 1px solid #4b4a4a;
    border-radius: 20px;
    padding: 30px;
}
.lake {
    border: 1px solid black;
    border-radius: 20px;
    max-width: 10%;
    text-align: center;
    padding: 5px;
    margin: 3px;
}
</style>
