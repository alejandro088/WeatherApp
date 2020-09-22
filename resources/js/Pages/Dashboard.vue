<template>
    <div>
        <!-- Page Heading -->
        <header class="bg-indigo-dark shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-indigo-lighter leading-tight">
                    WeatherApp
                    <span class="material-icons cursor-pointer" @click="changeToMyLocation">my_location</span>
                    <FindLocation @search="changeLocation" />
                </h2>
            </div>
        </header>
        <div v-if="loading" class="grid md:grid-flow-col gap-4 animate-pulse">
            <section class="row-span-3 ">
                <div class="mx-auto sm:px-6 lg:px-8">
                    <div class="text-indigo-lighter bg-indigo-dark shadow-xl sm:rounded-lg">
                        <div class="text-indigo-lighter w-48 rounded shadow-lg bg-gray-900">
                            <div class="rounded-full bg-indigo h-12 w-12"></div>
                            <div class="px-6 py-4">
                                <div class="space-y-2">
                                    <div class="h-4 bg-indigo rounded"></div>
                                    <div class="h-4 bg-indigo rounded"></div>
                                    <div class="h-4 bg-indigo rounded"></div>
                                    <div class="h-4 bg-indigo rounded"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="row-span-1 col-span-2">
                <div class="mx-auto sm:px-6 lg:px-12">
                    <div class="bg-indigo-dark sm:rounded-lg">
                        <div class="md:flex mx-12 justify-center shadow-xl sm:rounded-lg">
                            <div class="text-indigo-lighter mx-2 w-28 rounded shadow-lg">
                                <div class="h-4 bg-indigo rounded"></div>
                                <div class="rounded-full bg-indigo h-12 w-12"></div>
                                <div class="px-2 py-2">
                                    <div class="h-4 bg-indigo rounded"></div>
                                </div>
                            </div>

                            <div class="text-indigo-lighter mx-2 w-28 rounded shadow-lg">
                                <div class="h-4 bg-indigo rounded"></div>
                                <div class="rounded-full bg-indigo h-12 w-12"></div>
                                <div class="px-2 py-2">
                                    <div class="h-4 bg-indigo rounded"></div>
                                </div>
                            </div>

                            <div class="text-indigo-lighter mx-2 w-28 rounded shadow-lg">
                                <div class="h-4 bg-indigo rounded"></div>
                                <div class="rounded-full bg-indigo h-12 w-12"></div>
                                <div class="px-2 py-2">
                                    <div class="h-4 bg-indigo rounded"></div>
                                </div>
                            </div>

                            <div class="text-indigo-lighter mx-2 w-28 rounded shadow-lg">
                                <div class="h-4 bg-indigo rounded"></div>
                                <div class="rounded-full bg-indigo h-12 w-12"></div>
                                <div class="px-2 py-2">
                                    <div class="h-4 bg-indigo rounded"></div>
                                </div>
                            </div>

                            <div class="text-indigo-lighter mx-2 w-28 rounded shadow-lg">
                                <div class="h-4 bg-indigo rounded"></div>
                                <div class="rounded-full bg-indigo h-12 w-12"></div>
                                <div class="px-2 py-2">
                                    <div class="h-4 bg-indigo rounded"></div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </section>
            <section class="row-span-2 col-span-2">
                <div class="grid grid-cols-1 md:grid-cols-2 mx-12 justify-center">
                    <div class="text-indigo-lighter m-6 rounded shadow-lg text-center">
                        <div class="h-4 bg-indigo rounded"></div>
                        <div class="px-6 py-4">
                            <div class="h-8 bg-indigo rounded"></div>
                        </div>
                        <div class="h-4 bg-indigo rounded"></div>
                        <div class="h-4 bg-indigo rounded"></div>
                    </div>

                    <div class="text-indigo-lighter m-6 rounded shadow-lg text-center">
                        <div class="h-4 bg-indigo rounded"></div>
                        <div class="px-6 py-4">
                            <div class="h-8 bg-indigo rounded"></div>
                        </div>
                        <div class="h-4 bg-indigo rounded"></div>
                        <div class="h-4 bg-indigo rounded"></div>
                    </div>

                    <div class="text-indigo-lighter m-6 rounded shadow-lg text-center">
                        <div class="h-4 bg-indigo rounded"></div>
                        <div class="px-6 py-4">
                            <div class="h-8 bg-indigo rounded"></div>
                        </div>
                        <div class="h-4 bg-indigo rounded"></div>
                        <div class="h-4 bg-indigo rounded"></div>
                    </div>

                    <div class="text-indigo-lighter m-6 rounded shadow-lg text-center">
                        <div class="h-4 bg-indigo rounded"></div>
                        <div class="px-6 py-4">
                            <div class="h-8 bg-indigo rounded"></div>
                        </div>
                        <div class="h-4 bg-indigo rounded"></div>
                        <div class="h-4 bg-indigo rounded"></div>
                    </div>


                </div>
            </section>
        </div>
        <div v-if="!loading" class="grid md:grid-flow-col gap-4">
            <section class="row-span-3 ">
                <div class="mx-auto sm:px-6 lg:px-8">
                    <div class="text-indigo-lighter bg-indigo-dark shadow-xl sm:rounded-lg">
                        <ActualWeather :today="today" />
                    </div>
                </div>
            </section>
            <section class="row-span-1 col-span-2">
                <div class="mx-auto sm:px-6 lg:px-12">
                    <div v-if="forecast" class="bg-indigo-dark sm:rounded-lg">
                        <ForecastWeather :forecast="forecast" />
                    </div>
                </div>
            </section>
            <section class="row-span-2 col-span-2">
                <div class="grid grid-cols-1 md:grid-cols-2 mx-12 justify-center">
                    <CardItemWeather title="Wind Status" :item="Math.round(today.weather.wind_speed * 10) / 10" unit="mph" :wind="{direction: today.weather.wind_direction, point: today.weather.wind_direction_compass}" />
                    <CardItemWeather title="Humidity" :item="today.weather.humidity" unit="%" />
                    <CardItemWeather title="Visibility" :item="Math.round(today.weather.visibility * 10) / 10" unit="m" />
                    <CardItemWeather title="Air pressure" :item="today.weather.air_pressure" unit="mb" />
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
            loading: true,
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

        await this.findMyLocation();

        await this.setWeatherData(this.myLocationWeather[0].woeid);

        await this.setWeatherForecast(this.myLocationWeather[0].woeid);

        this.loading = await false;
    },
    methods: {
        async changeLocation(location) {
            //console.log(location)
            this.loading = true;

            await this.setWeatherData(location);

            await this.setWeatherForecast(location);

            this.loading = await false;
        },
        async changeToMyLocation() {
            //console.log(location)

            this.loading = true;

            await this.findMyLocation();

            await this.setWeatherData(this.myLocationWeather[0].woeid);

            await this.setWeatherForecast(this.myLocationWeather[0].woeid);

            this.loading = await false;
        },
        async findMyLocation() {
            const location = await fetch('https://geolocation-db.com/json/');
            this.location = await location.json()

            const myLocationWeather = await fetch(`/api/weather/findByCoords/${this.location.latitude}/${this.location.longitude}`);
            this.myLocationWeather = await myLocationWeather.json()
        },
        async setWeatherData(location) {
            const today = await fetch(`/api/weather/now/${location}`);
            this.today = await today.json()
        },
        async setWeatherForecast(location) {
            const forecast = await fetch(`/api/weather/forecast/${location}`);
            this.forecast = await forecast.json()
        }
    }
}

</script>
