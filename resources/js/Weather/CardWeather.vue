<template>
    <div v-if="dayWeather" class="text-weather-lighter mx-2 w-28 rounded shadow-lg">
        <p class="text-base">
            {{ dateAt }}
        </p>
        <img class="w-20" :src="`https://openweathermap.org/img/wn/${dayWeather.weather[0].icon}@2x.png`" :alt="dayWeather.weather[0].main">
        <div class="px-2 py-2">
            <p class="text-base">
                Min: {{ Math.round(dayWeather.temp.min * 10) / 10 }}ºC
                Max: {{ Math.round(dayWeather.temp.max * 10) / 10 }}ºC
            </p>
        </div>
    </div>
</template>
<script>
export default {
    props: ['dayWeather'],
    mounted() {

    },
    computed: {
        dateAt() {
            let dateFormatted = new Date(this.dayWeather.dt * 1000);
            return dateFormatted.getDate() + ' - ' + dateFormatted.getMonth();
        }
    }
}

</script>
