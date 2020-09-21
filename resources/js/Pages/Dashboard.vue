<template>
    <div>
        <!-- Page Heading -->
        <header class="bg-indigo-dark shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-indigo-lighter leading-tight">
                    WeatherApp
                    <FindLocation @search="changeLocation" />
                </h2>
            </div>
        </header>
        <div class="grid grid-rows-3 grid-flow-col gap-4">
            <section class="row-span-3 ">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="text-indigo-lighter bg-indigo-dark overflow-hidden shadow-xl sm:rounded-lg">
                        <ActualWeather :today="today" />
                    </div>
                </div>
            </section>
            <section class="row-span-1 col-span-2">
                <div class="mx-auto sm:px-6 lg:px-12">
                    <div v-if="forecast" class="bg-indigo-dark overflow-hidden shadow-xl sm:rounded-lg">
                        <ForecastWeather :forecast="forecast"  />
                    </div>
                </div>
            </section>
            <section class="row-span-2 col-span-2">
                <div class="grid grid-cols-2 mx-12 justify-center">
                    <CardItemWeather title="Wind Status" :item="Math.round(today.weather.wind_speed * 10) / 10" />
                    <CardItemWeather title="Humidity" :item="`${today.weather.humidity}%`" />
                    <CardItemWeather title="Visibility" :item="Math.round(today.weather.visibility * 10) / 10" />
                    <CardItemWeather title="Air pressure" :item="today.weather.air_pressure" />
                </div>
            </section>
        </div>
    </div>
</template>
<script>
import FindLocation from './../Weather/FindLocation'
import ForecastWeather from './../Weather/ForecastWeather'
import ActualWeather from './../Weather/ActualWeather'
import CardItemWeather from './../Weather/CardItemWeather'


export default {
    components: {
        FindLocation,
        ForecastWeather,
        ActualWeather,
        CardItemWeather
    },
    data() {
        return {
            today: {
                weather: {
                    weather_state_abbr: 'c',
                    weather_state_name: '',
                    the_temp: 0,
                    applicable_date: ''
                },
                title: ''
            },
            forecast: [],
            location: {
                city: ''
            },
            myLocationWeather: [{
                woeid: 0
            }]

        }
    },
    async mounted() {

        //https://geolocation-db.com/json/
        const location = await fetch('https://geolocation-db.com/json/');
        this.location = await location.json()

        const myLocationWeather = await fetch(`/api/weather/findByCoords/${this.location.latitude}/${this.location.longitude}`);
        this.myLocationWeather = await myLocationWeather.json()

        await this.setWeatherData(this.myLocationWeather[0].woeid);

        await this.setWeatherForecast(this.myLocationWeather[0].woeid);
    },
    methods: {
        changeLocation(location){
            //console.log(location)
            this.setWeatherData(location);

            this.setWeatherForecast(location);
        },
        async setWeatherData(location){
            const today = await fetch(`/api/weather/now/${location}`);
            this.today = await today.json()
        },
        async setWeatherForecast(location){
            const forecast = await fetch(`/api/weather/forecast/${location}`);
            this.forecast = await forecast.json()
        }
    }
}

</script>
