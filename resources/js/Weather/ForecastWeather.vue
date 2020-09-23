<template>
    <div>
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="md:flex mx-12 justify-center sm:rounded-lg">
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
    data(){
        return {
            
        }
    },
    mounted(){
        this.forecast.splice(0, 1);
        this.forecast.splice(-2);
    }
}

</script>
