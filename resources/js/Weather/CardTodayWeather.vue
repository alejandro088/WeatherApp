<template>
    <div class="text-indigo-lighter w-48 rounded shadow-lg bg-gray-900">
        <img class="w-full" :src="`/images/${todayWeather.weather.weather_state_abbr}.png`" :alt="todayWeather.weather.weather_state_name">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">{{ todayWeather.weather.weather_state_name }}</div>
            <p class="text-5xl">
                {{ Math.round(todayWeather.weather.the_temp * 10) / 10 }}ºC
            </p>
            <p>
                <i class="material-icons md-36">place</i> {{ todayWeather.title }}
            </p>
            <p>  {{ todayWeather.weather.applicable_date }}  </p>
        </div>
    </div>
</template>
<script>
export default {
    props: ['todayWeather'],
    mounted() {

    }
}

</script>
