<template>
    <div>
        <div class="main">
            <h1>Molėtų regiono žvejo bilieto patvirtinimas</h1>
            <h2>Zvejo megejo bilietas</h2>
            <h3>Zvejo duomenys :</h3>

            <div>
                <p>Vardas : {{this.tickets.first_name}}</p>
                <p>Pavarde : {{this.tickets.last_name}}</p>
            </div>
            <h3>Laikotarpis</h3>
            <div>
                <p>Leidimo isdavimo data :  {{this.tickets.date}}</p>
                <p>Leidimas galioja :  {{this.tickets.days}} diena(s)</p>
                <p>Meskeriu skaicius: {{this.tickets.quantity}}</p>
            </div>
            <h2>Pasirinkti ezerai : </h2>

            <!--            @foreach($ticket->assignedLakes as $assigned)-->
            <!--            <p>{{$assigned->lake->name}}</p>-->
            <!--            @endforeach-->


            <h3>Leidimo kaina - {{this.tickets.price}} Eur</h3>
        </div>
    </div>
</template>

<script>

export default {
    name: "ExampleComponent",
    data () {
        return {
            arr: {},
            tickets: []
        }

    },
    created () {
        this.get()
    },

    methods: {
        get() {
            fetch("http://127.0.0.1:8000/api/ticket/" + this.$route.params.link)
                .then(res => res.json())
                .then(data => {
                        console.log(data)
                        this.tickets = data
                    console.log(this.tickets)
                    }
                );
        }
    }
}

</script>

<style scoped>

.main {
    /*border: 1px solid black;*/

}
</style>
