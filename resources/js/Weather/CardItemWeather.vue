<template>
    <div v-if="item" class="text-indigo-lighter m-6 rounded shadow-lg text-center">
        <p class="text-base text-center">
            {{ title }}
        </p>
        <div class="px-6 py-4">
            <p class="font-bold text-center text-3xl mb-2">{{ item }}{{ unit }}</p>
        </div>
        <p v-if="wind" class="text-base text-center wind">
            <i class="material-icons" :class="`dir-${wind.direction}`">arrow_downward</i>
        </p>
        
        <p v-if="wind" class="text-base text-center py-4">
            {{ wind.direction }}
        </p>
    </div>
</template>
<script>
export default {
    props: ['item', 'title', 'unit', 'wind'],
    mounted() {

    }
}

</script>

<style>

.wind .dir-ese {
    transform: rotate(112.5deg);
} 

.wind .dir-nne {
    transform: rotate(22.5deg);
}

.wind .dir-ne {
    transform: rotate(45deg);
}

.wind .dir-e {
    transform: rotate(90deg);
}

</style>
