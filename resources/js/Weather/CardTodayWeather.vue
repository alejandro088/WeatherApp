<template>
    <div class="text-indigo-lighter w-48 rounded shadow-lg bg-gray-900">
        <img class="w-full" :src="`https://openweathermap.org/img/wn/${todayWeather.weather[0].icon}@2x.png`" :alt="todayWeather.weather[0].main">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">{{ todayWeather.weather[0].main }}</div>
            <p class="text-5xl">
                {{ Math.round(todayWeather.temp * 10) / 10 }}ºC
            </p>
            <p v-if="location">
                <i class="material-icons md-36">place</i> {{ location.city ? location.city : location.town }}
            </p>
            <p>  {{ todayWeather.dt }}  </p>
        </div>
    </div>
</template>
<script>
export default {
    props: ['todayWeather', 'location'],
    mounted() {

    }
}

</script>
