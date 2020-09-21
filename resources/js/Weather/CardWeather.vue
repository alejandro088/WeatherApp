<template>
    <div v-if="dayWeather" class="text-indigo-lighter mx-2 w-28 rounded overflow-hidden shadow-lg">
        <p class="text-base">
            {{ dayWeather.applicable_date }}
        </p>
        <img class="w-20" :src="`/images/${dayWeather.weather_state_abbr}.png`" :alt="dayWeather.weather_state_name">
        <div class="px-2 py-2">
            <p class="text-base">
                {{ Math.round(dayWeather.min_temp * 10) / 10 }} - {{ Math.round(dayWeather.max_temp * 10) / 10 }}
            </p>
        </div>
    </div>
</template>
<script>
export default {
    props: ['dayWeather'],
    mounted() {

    }
}

</script>
