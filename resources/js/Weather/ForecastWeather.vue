<template>
    <div>
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center overflow-hidden shadow-xl sm:rounded-lg">
                <CardWeather v-for="day in forecast" :key="day.index" :day-weather="day" />
            </div>
        </div>
    </div>
</template>
<script>
import CardWeather from './../Weather/CardWeather'

export default {
    components: {
        CardWeather
    },
    props: ['forecast'],
    mounted(){
        console.log(this.forecast);
    }
}

</script>
