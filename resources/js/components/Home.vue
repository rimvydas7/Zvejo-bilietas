<template>
    <div class="main">
        <h1>Molėtų regiono žvejo bilieto leidimo uzsakymas</h1>
        <h2>Zvejo megejo bilietas</h2>
        <h3>Zvejo duomenys :</h3>
        <div>
            <label>Vardas *</label>
            <input name="first_name" placeholder="Vardas" v-model="first_name">
            <label>Pavarde *</label>
            <input name="last_name" placeholder="Pavarde" v-model="last_name">
        </div>
        <p>"Vardas" ir "Pavardė" rašomas vardas ir pavardė iš didžiosios raidės vardininko linksniu pagal lietuvių kalbos taisykles (pvz. Vardenis Pavardenis).</p>
        <h3>Laikotarpis</h3>
        <div>
            <div>
                <label>Nuo kada ketinate zvejoti :</label>
                <input type="date" name="date" v-model="date">
            </div>
            <div>
                <label>Zvejybos dienu skaicius :</label>
                <input type="number" name="days" v-model="days">
            </div>
            <div>
                <label>Meskeriu skaicius :</label>
                <input type="number" name="quantity" v-model="quantity">
            </div>
        </div>
        <h2>Pasirinkite ezerus :</h2>

        <div v-for="(lake, index) in lakes" :key="index">
            <div @click="getId(lake)"  :value="lake.id">{{ lake.name }}</div>
        </div>

        <div><button @click="send()">Toliau</button></div>
    </div>
</template>

<script>
export default {
    name: "FormComponent",
    data () {
        return {
            first_name: '',
            last_name: '',
            date: '',
            days: '',
            quantity: '',
            code: '',
            lakes: {},
            assignedLakes: [],
        }
    },
    created() {
        fetch("http://127.0.0.1:8000/api/lakes")
            .then((res) => res.json())
            .then((data) => {
                this.lakes = data
                console.log(this.lakes)
            })
    },
    methods: {
        getId(lake) {
            this.assignedLakes.push(lake)
            console.log(this.assignedLakes)
        },
        send() {
            const link = Math.random();

            fetch("http://127.0.0.1:8000/api/ticket/",
                {
                    method: "POST",
                    // mode: "no-cors",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'Accept': 'application/json, text/plain, */*',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(
                        {
                            first_name: this.first_name,
                            last_name: this.last_name,
                            date: this.date,
                            days: this.days,
                            quantity: this.quantity,
                            link: link,
                            lakes: this.assignedLakes
                        }
                    )
                })
            .then((res) => res.json())
            .then((data) => {
                this.code = data.link
                this.$router.push('/about/' + this.code)
            });
        }
    },
}
</script>

<style scoped>

.main {
    border: 1px solid black;
}
</style>
