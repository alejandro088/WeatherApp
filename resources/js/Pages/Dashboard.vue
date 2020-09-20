<template>
    <div>

        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                 <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    WeatherApp
                     <FindLocation />
                </h2>
            </div>
        </header>
        

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <ActualWeather />
                </div>
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <ForecastWeather />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import FindLocation from './../Weather/FindLocation'
    import ForecastWeather from './../Weather/ForecastWeather'
    import ActualWeather from './../Weather/ActualWeather'

    export default {
        components: {
            FindLocation, ForecastWeather, ActualWeather
        },
    }
</script>
