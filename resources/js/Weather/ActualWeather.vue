<template>
    <div class="flex justify-center">
        <CardTodayWeather v-if="today" :today-weather="today" />
    </div>
</template>
<script>
import CardTodayWeather from './../Weather/CardTodayWeather'

export default {
    components: {
        CardTodayWeather
    },
    props: ['today'],
    data() {
        return {
            

        }
    },
    async mounted() {


    }
}

</script>
