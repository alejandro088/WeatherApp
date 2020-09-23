<template>
    <div class="flex justify-center">
        <CardTodayWeather v-if="today" :today-weather="today" :location="location"/>
    </div>
</template>
<script>
import CardTodayWeather from './../Weather/CardTodayWeather'

export default {
    components: {
        CardTodayWeather
    },
    props: ['today', 'location'],
    data() {
        return {
            

        }
    },
    async mounted() {


    }
}

</script>
