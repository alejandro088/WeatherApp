<template>
    <div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <CardWeather />
                    <CardWeather />
                    <CardWeather />
                    <CardWeather />
                    <CardWeather />
                </div>
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
}

</script>
