<template>
    <div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <form class="w-full max-w-sm">
                        <div class="flex items-center border-b border-teal-500 py-2">
                            <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" v-model="search" placeholder="Enter a location..." aria-label="search">
                            <button class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded" @click="find" type="button">
                                Search
                            </button>
                        </div>
                    </form>

                    <div v-for="city in cities" :key="city.index">
                        <button @click="updateCity(city.woeid)">{{ city.title }}</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return {
            search: '',
            cities: []
        }
    },
    methods: {
        async find() {
            const searchWeather = await fetch(`/api/weather/findByLocation/${this.search}`);
            this.cities = await searchWeather.json()
        },
        updateCity(location){

            this.$emit('search', location);
            this.cities = null;
            this.search = '';

        }
    }
}

</script>
