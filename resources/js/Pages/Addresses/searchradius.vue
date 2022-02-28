<template>

    <app-layout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <form @submit.prevent="searchAddress()" class="mb-5">
                        <div class="border rounded-lg shadow-md px-3 py-3 flex flex-row bg-white relative mb-5">
                            <div class="border-1 flex border border-gray-300 rounded-lg overflow-hidden w-max relative">
                                <span class=" px-3 py-1 flex justify-center items-center bg-gray-200">Search Radius in Meters:</span>
                                <input type="number" min="100" max="50000" name="radius" id="radius_input" v-model="searchRadius" class="px-2">
                            </div>
                        </div>

                        <div class="border rounded-lg shadow-md px-3 py-3 flex flex-row bg-white relative">
                            <div class="flex  w-max relative">
                                <label class="block">
                                    <span class="text-gray-700">Select Address</span>
                                    <select @change="search(address)" class="form-select mt-1 block w-full" v-model="address">
                                        <option v-for="address in addresses" v-bind:value="address"> {{address.address}} </option>
                                    </select>
                                </label>
                            </div>
                        </div>
                    </form >

                    <div class="border rounded-lg p-6  mb-5" v-for="result in results">
                        {{result.name}}
                    </div>

                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>

    import AppLayout from "@/Layouts/AppLayout";

    export default {
        props: ['addresses', 'results'],
        components: {
            AppLayout
        },
        data(){
            return {
                name: 'Bogdan',
                searchRadius: 10000,
                address: null
            }
        },

        methods: {
            search: function (address){
                let radius = this.searchRadius;
                var results = this.$inertia.post('/searchradius/search', {address, radius});
                console.log(results);
            },
            searchAddress: function(){
                console.log('wtf');
            }
        }
    }
</script>
