<script>

import axios from 'axios';

export default {
    name: 'ApiContent',

    data() {
        return {
            technologies: [],

            createFormActive: false,


            // DEBUG
            // newTechnology: {
            //     name: '',
            //     description: ''
            // }
            // DEBUG 

            newTechnology: {
                name: 'mia tecnologia',
                description: 'ciao'
            }

        }
    },

    methods: {

        toggleCreateNewTechnology() {

            this.createFormActive = true;
        },

        submitNewTechnology() {

            axios.post('http://127.0.0.1:8000/api/v1/technologies', this.newTechnology)
                .then(res => {

                    const data = res.data;
                    console.log(data)

                    if (data.status == 'success') {
                        this.technologies.push(data.technology);
                        this.createFormActive = false;
                    }

                })

                .catch(err => {

                    console.err(err);
                });
        }
    },

    mounted() {

        axios.get('http://127.0.0.1:8000/api/v1/technologies')

            .then(res => {

                const data = res.data;
                console.log(data);

                if (data.status == 'success')
                    this.technologies = data.technologies;

                console.log('technologies', this.technologies);

            })

            .catch(err => {

                console.err(err);
            })
    }
}
</script>



<template>
    <h1>
        Technologies:
    </h1>

    <form v-if='createFormActive' @submit.prevent="submitNewTechnology">

        <label for="name">Name</label>
        <input type="text" name="form" id="form" v-model="newTechnology.name">
        <br>
        <label for="description">Description</label>
        <input type="text" name="description" id="description" v-model="newTechnology.description">
        <br>

        <input type="submit" value="Invia">

    </form>

    <div v-else>

        <button @click="toggleCreateNewTechnology">Create a New Technology!</button>

        <ul>
            <li v-for="technology in technologies" :key="technology.id">
                <h2> {{ technology.name }}</h2>
                <p>{{ technology.description }}</p>
            </li>
        </ul>

    </div>
</template>


<style scoped>
ul {
    list-style-type: none;
}

p {
    font-size: 1.5em;
}
</style>
