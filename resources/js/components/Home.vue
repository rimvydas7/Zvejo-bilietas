<template>
    <div>
        <div class="image">
        <Nav/>
            <div class="main">
                <h1>Molėtų regiono žvejo bilieto užsakymas</h1>
                <h2>Žvejo mėgėjo bilietas</h2>
                <h3>Žvejo duomenys :</h3>
                <div>
                    <label>Vardas *</label>
                    <input name="first_name" placeholder="Vardas" v-model="first_name">
                </div>
                <div>
                    <label>Pavarde *</label>
                    <input name="last_name" placeholder="Pavarde" v-model="last_name">
                </div>
                <p>"Vardas" ir "Pavardė" rašomas vardas ir pavardė iš didžiosios raidės vardininko linksniu pagal lietuvių kalbos taisykles (pvz. Vardenis Pavardenis).</p>
                <h3>Laikotarpis</h3>
                <div>
                    <div>
                        <label>Nuo kada ketinate žvejoti *</label>
                        <input type="date" name="date" v-model="date">
                    </div>
                    <div>
                        <label>Žvejybos dienu skaicius *</label>
                        <input type="number" name="days" v-model="days">
                    </div>
                    <div>
                        <label>Meskeriu skaicius *</label>
                        <input type="number" name="quantity" v-model="quantity" >
                    </div>
                </div>
                <h2>Pasirinkite ežerus *</h2>

                <div class="flex">
                    <div v-for="(lake, index) in lakes" :key="index">
                        <div class="lake" @click="getId(lake)"  :value="lake.id">{{ lake.name }}</div>
                    </div>
                </div>
                <p class="redText">{{error}}</p>

                <div><button @click="send()">Toliau</button></div>
            </div>
        </div>
    </div>
</template>

<script>
import Nav from "./Nav";
export default {
    name: "FormComponent",
    components: {
      Nav
    },
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
            error : '',
        }
    },
    created() {
        fetch("http://127.0.0.1:8000/api/lakes")
            .then((res) => res.json())
            .then((data) => {
                this.lakes = data
            })
    },
    methods: {
        getId(lake) {
            this.assignedLakes.push(lake)
        },
        send() {
            const link = Math.random();

            if(this.first_name === '' || this.last_name === '' || this.date === '' || this.days === '' || this.quantity === '') {
                this.error = 'Visi laukai privalo buti uzpildyti'
            } else {
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
                        this.$router.push('/pay/' + data.link)

                    });
            }
        }
    },
}
</script>

<style scoped>
.image {
    background-image: url('https://i.natgeofe.com/n/3f2a2e55-47f9-4dda-9f03-bbbd4e9d343e/Trav%20Lake%20GettyImages-909708218.jpg');
    padding-bottom: 50px;
    height: 1000px;
}
.main {
    background-color: rgba(40, 102, 6, 0.95);
    width: 50%;
    margin: 30px auto;
    border: 1px solid #4b4a4a;
    border-radius: 20px;
    padding: 30px;
}
input {
    width: 50%;
    border-radius: 20px;
    padding-left: 20px;
    margin: 5px 20px;
}
.lake {
    border: 1px solid black;
    border-radius: 20px;
    text-align: center;
    padding: 5px 10px;
    margin: 3px;
    cursor: pointer;
    font-weight: bold;
}
.lake:hover{
    border: 1px solid white;
    color: white;
}
button {
    border: 1px solid black;
    border-radius: 20px;
    padding: 10px 20px;
    margin-top: 20px;
    text-align: center;
    justify-content: center;
    cursor: pointer;
}
.redText {
    color: #c23232;
    font-weight: bold;
    font-size: 30px;
}
</style>
