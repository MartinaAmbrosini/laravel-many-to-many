<script>

import axios from 'axios';

export default {
    name: 'ApiContent',

    data() {
        return {
            technologies: []
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

    <ul>
        <li v-for="technology in technologies" :key="technology.id">
            <h1> {{ technology.name }}</h1>
            <p>{{ technology.description }}</p>
        </li>
    </ul>
</template>
