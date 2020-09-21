<template>
    <div v-if="item" class="text-indigo-lighter m-6 rounded shadow-lg text-center">
        <p class="text-base text-center">
            <dl>
                <dd>
                    {{ title }}
                </dd>
            </dl>
        </p>
        <div class="px-6 py-4">
            <div class="font-bold text-center text-3xl mb-2">{{ item }}</div>
        </div>
    </div>
</template>
<script>
export default {
    props: ['item', 'title'],
    mounted() {

    }
}

</script>
