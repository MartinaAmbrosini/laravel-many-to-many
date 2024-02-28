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

                if (data.success == 'success')
                    this.technologies = data.technologies;

                console.log("technologies", this.technologies)

            })

            .catch(err => {

                console.err(err);
            })
    }
}
</script>



<template>
    <h1>
        Technologies!
    </h1>
</template>
