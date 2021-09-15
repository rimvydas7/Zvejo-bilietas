<template>
    <div class="image">
        <Nav/>
        <div class="main">

            <div class="center">
                <h1>Molėtų regiono žvejo bilieto patvirtinimas</h1>
                <h2>Žvejo mėgėjo bilietas</h2>
            </div>

            <div class="flexas">
                <div>
                    <h3>Žvejo duomenys :</h3>
                    <div>
                        <p>Vardas : {{this.ticket.first_name}}</p>
                        <p>Pavarde : {{this.ticket.last_name}}</p>
                    </div>

                    <h3>Laikotarpis</h3>
                    <div>
                        <p>Leidimo isdavimo data :  {{this.ticket.updated_at.replace('T', ' ').replace('.000000Z', '')}}</p>
                        <p>Leidimas galioja :  {{this.ticket.days}} diena(s)</p>
                        <p>Meskeriu skaicius: {{this.ticket.quantity}}</p>
                    </div>
                </div>

                <div class="space">
                    <h2>Pasirinkti ežerai : </h2>
                    <div v-for="(lake, index) in lakes" :key="index">
                        <div v-if="lake.id === assignedLakes.lake_id">
                            <div @select="lake.name" class="lake">{{lake.name}}</div>
                        </div>
                    </div>
                    <h3>Leidimo kaina - {{this.ticket.price}} Eur</h3>

                    <vue-qr :size=this.size :text=this.value :callback="test"></vue-qr>
                    <div class="pdf">
                        <button @click="downloadPDF">Atsisiusti PDF faila</button>
                    </div>

                </div>

            </div>
        </div>

    </div>
</template>

<script>

import jsPDF from 'jspdf';
import Nav from "./Nav";
import VueQr from 'vue-qr';

export default {

    name: "ExampleComponent",
    components: {
        VueQr,
        Nav,
    },
    data () {
        return {
            arr: {},
            ticket: [],
            assignedLakes: {},
            lakes: {},
            size: 200,
            value: 'http://127.0.0.1:8000/about/'+ this.$route.params.link,
            qrImg : '',
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
        test(url,id){
            url = this.value;
            id = this.ticket.id;
        },
        downloadPDF() {

            console.log(this.assignedLakes);
            let pdf = new jsPDF();

            let text = `
                        Moletu regiono žvejo bilieto patvirtinimas

                                 Žvejo megejo bilietas

        Žvejo duomenys :

            Vardas : ${this.ticket.first_name}
            Pavarde : ${this.ticket.last_name}

        Laikotarpis:

            Leidimo isdavimo data :  ${this.ticket.updated_at.replace('T', ' ').replace('.000000Z', '')}
            Leidimas galioja :  ${this.ticket.days} diena(s)
            Meskeriu skaicius: ${this.ticket.quantity}

        Leidimo kaina : ${this.ticket.price}.00 Eur`


            pdf.text(text, 10, 10);
            pdf.save('info.pdf');
        },

        assigned() {
            fetch('http://127.0.0.1:8000/api/assigned/' + this.ticket.id)
                .then(res => res.json())
                .then(data => {
                    this.assignedLakes = data
                })
        },

        get() {
            fetch("http://127.0.0.1:8000/api/ticket/" + this.$route.params.link)
                .then(res => res.json())
                .then(data => {
                        this.ticket = data
                });
        }
    }
}

</script>

<style scoped>
.center {
    text-align: center;
}
.flexas {
    display: flex;
}
.space {
    padding-left: 30px;
}
.image {
    background-image: url('https://i.natgeofe.com/n/3f2a2e55-47f9-4dda-9f03-bbbd4e9d343e/Trav%20Lake%20GettyImages-909708218.jpg');
    padding-bottom: 50px;
}
.main {
    background-color: rgba(40, 102, 6, 0.95);
    width: 50%;
    margin: 30px auto;
    border: 1px solid #4b4a4a;
    border-radius: 20px;
    padding: 30px;
}
.lake {
    border: 1px solid black;
    border-radius: 20px;
    max-width: 40%;
    text-align: center;
    padding: 5px;
    margin: 3px;
}
</style>
