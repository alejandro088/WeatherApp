<template>
    <div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-xl sm:rounded-lg">
                    <div class="items-center border-b border-teal-500 py-2">
                        <v-select class="bg-indigo" v-model="finder" :filterable="false" :options="cities" @input="updateCity" @search="find" label="title">
                            <template #list-header>
                                <div class="cursor-pointer" @click="$emit('detect')">
                                    <span class="material-icons">my_location</span> 
                                Detect  my Ubication
                                </div>
                            </template>
                            <template slot="no-options">
                                type to search a location..
                            </template>
                            <template #option="{ title }">
                                <div class="d-center cursor-pointer">
                                   {{ title }}
                                </div>
                            </template>
                            <template #selected-option="{ title }">
                                <div class="selected d-center">
                                     <i class="material-icons">place</i> {{ title }}
                                </div>
                            </template>
                        </v-select>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import vSelect from 'vue-select'
var _ = require('lodash');

export default {
    components: {
        vSelect
    },
    data() {
        return {
            finder: { title: ''},
            cities: []
        }
    },
    methods: {
        async find(search, loading) {

            if(search != ''){
                loading(true);
                this.search(loading, search, this);    
            }
            
            //const searchWeather = await fetch(`/api/weather/findByLocation/${search}`);
            //this.cities = await searchWeather.json()
        },
        updateCity(location) {
            
            this.$emit('search', location.woeid);

        },
        search: _.debounce((loading, search, vm) => {
            fetch(
                `/api/weather/findByLocation/${escape(search)}`
            ).then(res => {
                res.json().then(json => (vm.cities = json));
                loading(false);
            });
        }, 2000)
    }
}

</script>
<style>
.d-center {
    display: flex;
    align-items: center;
}

.selected img {
    width: auto;
    max-height: 23px;
    margin-right: 0.5rem;
}

.v-select .dropdown li {
    border-bottom: 1px solid rgba(112, 128, 144, 0.1);
}

.v-select .dropdown li:last-child {
    border-bottom: none;
}

.v-select .dropdown li a {
    padding: 10px 20px;
    width: 100%;
    font-size: 1.25em;
    color: #3c3c3c;
}

.v-select .dropdown-menu .active>a {
    color: #fff;
}

</style>
