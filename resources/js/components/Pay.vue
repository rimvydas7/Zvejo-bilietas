<template>
    <div class="image">
        <Nav/>
        <div class="main">
            <h1>Apmokejimas</h1>
            <p>Moketojo vardas : {{ticket.first_name}}</p>
            <p>Moketojo pavarde : {{ticket.last_name}}</p>
            <p>Zvejybos data nuo : {{ticket.updated_at.replace('T', ' ').replace('.000000Z', '')}}</p>
            <p>Zvejybos dienu skaicius : {{ticket.days}}</p>
            <p>Zvejybos meskeriu skaicius : {{ticket.quantity}}</p>
            <h3>Pasirinkite mokejimo buda :</h3>
            <div class="logos">
            <img src="https://www.freedomsurfer.com/wp-content/uploads/2017/04/swedbankeelogo.png" alt="swedbank">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAR0AAACxCAMAAADOHZloAAAAkFBMVEVNFj3///9DADE9ACmomaNCAC/a1NhHADW0p7BJCzhFADM5ACM/ACyzo6729fVwUGWrmKaIb39yTGbAsbvx7vDm3+TKv8eJcoGdiZeDZXrVzNJICDdRGEF8XXLk3uJoQ1xfM1FTIURZKkuUgI1rSGCijpuSeopmPFjq5+pfMlHFt8B/YnXYz9WDaXm8rLfSxs4VdF6qAAAFaklEQVR4nO2b6XayOhhGgRgxGNFWa60oCq1jB+7/7g5DBsDhO101iGs9+5ckeUnYppmwlgUAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAPAgsHs3oM14K+/eTWgv9NvekHs3oq3QN9u236HnLHRpZ8yg5wxOIce2t/zeTfklLMNsFYGUk/5xuWaruilOx5/kUJO1uDNlp2e0ohtDe6LVZgcEIvUMHmrgaciO1PPTN1vNjWnKjkU2aSXjh+o5DdrJ9Iwfq+c0acfiTw+3k2jQjvVwchq183jAzjWu22GsvpAupZSyAkqo6xJCVVGPENflpYTrgc7JYp05PL2DS3g1S4fmBQyv8a/a2T3n7HQboiLlOU1hq+xDNpa4ZNkLs/X212BdbKN4NJrv04Rub0VYJTAuB3pk+ZMF7uejuLr/8siqk2R32E9HB6I3H2tRucXIIS3gD5wb+6hyzQ49FlmJarn3JkqnUzMJ8023Y5HPF7VPsKdRYLnRUSckUf4wQ3H56l4JlDC63escO3ySXdAZZNdHYjm7eZ41NrsvuWpnLBp+YsfP7HTzT1G+zNNM1s7KLyfssxNTZefJ1YGzWqDsot46tKuEh2K+c0b55ZDIb6nlduzxa+1JJotJNSHreqd27ONTPVDM+PTNPuWTluyEO5ncdjt2paPkT1lP+GDn7JwGDvJH9Zb19Jylp+3oKlpv598c+Vk7J/iLtAp2OLFWEDNtR/EQdvbJvNpj/K9Ej6sTctGO30262sZ3OjmRubqczrabqbqak8e0Ez73CSHb0jNv04T+To6tfszO2/FfeRpI1eiczs/6FHG6IJ7rkTiRCcugbudlvjV70ngDO3uSz8X8W7V6mH+jgSv70/CCnXWxWlFi51x3nYHYz7P+WOdW7Axiyg0fw97AzrdoIperl6m4F5Vz/Wdw1s5I3rcvNHY5O4i8rm4Pl30wYiU7YczNv1v9u52J/P7oQNzqTaSwD+XvrJ1YPh4Xq8cX7sppfqjXhu5S3Vfb6dIm3jv/3c6XjPTexa3Usm7hSyXn7ISqSqcj7cjm7MvnZER0rZ6j7SwaeSn/dzs/ctpwxbpwor52etXOUd92Ju1wMQaPy9suPpUBys6omddif7ejNoLKjpplr9vRO0hth3wVnzrlmdoRf7KJtrNq5vccv7PjNmanvPemnbqdSUOvDH9pZ2vajpjQK6s8OWhPlZ2wobO6/2Mn0cNnz7AdWWW3MiqLKb1HpZ1ui+yEqu/05QbSlB1PLgxjPbCwWKRt1Yw+b9pOn9Wx6I9wEcnDSrlWM2aHrUS50ntBIvdaB3Y3O+KUtIRahsjfbDG1zDdmR/0V2d+yw6p9Rpdad7NzykJ1c/u1Tx1KArVhNmdH1/ne99IO7Oijx63XIjv+gkXq4mU86CX6qMGcHYuok49wtluvNupyz61W2bH6+0t55uwEQ/s82c6rVXa82aU8c3Yser7SWXbXVtmxvPrLgWRg3I5F6geAGaPcR7vssLh6yPviEt+4HYs/1Y+WfTGDtceOnZ2BB/G8lHJkzCsUlOz06nZ8bUcpqbztqwda3qZix/IieR4oSkbiZY6089WQneC7c4FNns/I8DjJvkp/39vx/EmyvLS17ntR7lMeWLAPEai2iK641Yqx9aD4+MFOAy02LFJmMpJRNkuKaifJ1lUnXWxZFDR8nKwJnAvIX9sEnEerj1UkfzHgyTy3KFd6wVsNFGVTskBHfzwJlJHlZ/YIjdNqY145Oz5T8P4Y/0HzpVrxbzkAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADDLfxDxaL870dBZAAAAAElFTkSuQmCC">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRrCxnePAiS2CLPViJUaHh_aJ2e2SvR4bXEtg&usqp=CAU">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSxNXQf3QUtz-9mTKmnmzjk7ocMkvJ3NC8_ew&usqp=CAU">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT7H13CMwzTzVtmqeYoeuDF1FlsuqcFCN6N7g&usqp=CAU">
            </div>
            <select>
                <option>Swedbank e-bankas</option>
                <option>Luminor e-bankas</option>
                <option>SEB e-bankas</option>
                <option>Citadele e-bankas</option>
                <option>Bitcoin, Ethereum, Litecoin</option>
            </select>

            <h4>Kaina: {{ticket.price}}.00 €</h4>
            <button @click="pay">Apmoketi</button>
        </div>
    </div>
</template>

<script>
import Nav from './Nav';
export default {
    name: "Pay",
    components: {
        Nav
    },
    data () {
        return {
            ticket : {}
        }
    },
    created () {
        fetch("http://127.0.0.1:8000/api/ticket/" + this.$route.params.link)
            .then(res => res.json())
            .then(data => {
                this.ticket = data
            });
    },
    methods: {
        pay() {
            this.$router.push('/about/' + this.$route.params.link)
        }
    },
}
</script>

<style scoped>
.image {
    background-image: url('https://i.natgeofe.com/n/3f2a2e55-47f9-4dda-9f03-bbbd4e9d343e/Trav%20Lake%20GettyImages-909708218.jpg');
    padding-bottom: 50px;
    min-height: 100%;
}
.main {
    background-color: rgba(40, 102, 6, 0.95);
    width: 50%;
    margin: 30px auto;
    border: 1px solid #4b4a4a;
    border-radius: 20px;
    padding: 30px;
    height: 700px;
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
img {
    height: 40px;
    width: 90px;
}
</style>
