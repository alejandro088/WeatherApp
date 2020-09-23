<template>
    <div>
        <!-- Page Heading -->
        <header class="bg-indigo-dark shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-indigo-lighter leading-tight">
                    WeatherApp
                    <span class="material-icons cursor-pointer" @click="changeToMyLocation">my_location</span>
                    <FindLocation @detect="changeToMyLocation" @search="changeLocation" />
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
                <div class="sm:px-2 md:px-2">
                    <div class="bg-indigo-dark sm:rounded-lg">
                        <div class="md:flex mx-12 justify-center sm:rounded-lg">
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
                        <ActualWeather :today="forecast.current" :location="place.address" />
                    </div>
                </div>
            </section>
            <section class="row-span-1 col-span-2">
                <div class="sm:px-2 md:px-2">
                    <div v-if="forecast" class="bg-indigo-dark sm:rounded-lg">
                        <ForecastWeather :forecast="forecast.daily" />
                    </div>
                </div>
            </section>
            <section v-if="forecast" class="row-span-2 col-span-2">
                <div class="grid grid-cols-1 md:grid-cols-2 mx-12 justify-center">
                    <CardItemWeather v-if="forecast.current" title="Wind Status" :item="Math.round(forecast.current.wind_speed * 10) / 10" unit="km/h" :wind="{direction: forecast.current.wind_deg}" />
                    <CardItemWeather title="Humidity" :item="forecast.current.humidity" unit="%" />
                    <CardItemWeather title="Visibility" :item="Math.round(forecast.current.visibility * 10) / 10" unit="m" />
                    <CardItemWeather title="Air pressure" :item="forecast.current.pressure" unit="mb" />
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
            forecast: {},
            location: {},
            place: {},
            myLocationWeather: {}

        }
    },
    async mounted() {

        //https://geolocation-db.com/json/

        await this.findMyLocation();

        
    },
    methods: {
        async changeLocation(location) {
            //console.log(location)
            this.loading = true;

            //await this.setWeatherData(location);

            console.log(location);

            await this.setWeatherForecast(location);

            let place = await fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${location.lat}&lon=${location.lon}`);
            this.place = await place.json();

            this.loading = await false;
        },
        async changeToMyLocation() {
            //console.log(location)

            this.loading = true;

            await this.findMyLocation();

            this.loading = await false;
        },
        async findMyLocation() {
            var options = {
                enableHighAccuracy: true,
                timeout: 5000,
                maximumAge: 0
            };
            await navigator.geolocation.getCurrentPosition(this.success, this.error, options);
            //const location = await fetch('https://geolocation-db.com/json/');
            //this.location = await location.json()
        },
        async success(pos) {
            var crd = pos.coords;

            this.location = crd;

            const myLocationWeather = await fetch(`/api/weather/forecast/${this.location.latitude}/${this.location.longitude}`);
            this.forecast = await myLocationWeather.json()

            let place = await fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${this.location.latitude}&lon=${this.location.longitude}`);
            this.place = await place.json();
        

            //await this.setWeatherData(this.myLocationWeather[0].woeid);

            //await this.setWeatherForecast(this.myLocationWeather[0].woeid);

            this.loading = await false;
        },
        error(err) {
            console.warn('ERROR(' + err.code + '): ' + err.message);
        },
        async setWeatherForecast(location) {
            const forecast = await fetch(`/api/weather/forecast/${location.lat}/${location.lon}`);
            this.forecast = await forecast.json()
        }
    }
}

</script>
