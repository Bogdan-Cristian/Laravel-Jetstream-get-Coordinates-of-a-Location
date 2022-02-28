<template>
    <app-layout>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="pt-5 mb-5">

            <form @submit.prevent="addAddress">
                <div class="border rounded-lg shadow-md px-3 py-3 flex flex-row bg-white relative">
                    <div class="border-1 flex border border-gray-300 rounded-lg overflow-hidden w-max relative">
                        <span class=" px-3 py-1 flex justify-center items-center bg-gray-200">Address:</span>
                        <input type="text" name="address" id="address_input" v-model="addAddressForm.address" class="px-2">
                        <button class="py-2 px-4 bg-green-500 text-white font-semibold  shadow-md focus:outline-none">Add</button>

                    </div>
                </div>
            </form>
        </div>
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
            <tr>
                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Id
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Address
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    GEO_Latitude
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    GEO_Longitude
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                    Options
                </th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">


            <tr v-for="address in addresses">
                <!-- ID -->
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray ">
                                {{address.id}}
                            </div>
                        </div>
                    </div>
                </td>

                <!-- Address -->
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray capitalize">
                                {{address.address}}
                            </div>
                        </div>
                    </div>
                </td>

                <!-- Geo_Long -->
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray">
                                {{address.geo_lat}}
                            </div>
                        </div>
                    </div>
                </td>

                <!-- Geo_Lat -->
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray ">
                                {{address.geo_lon}}
                            </div>
                        </div>
                    </div>
                </td>

                <!-- Delete -->
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center justify-center">
                        <button class="px-3 py-2 border rounded-lg bg-red-500 text-white mr-2" @click="deleteAddress(address)">
                            Delete
                        </button>

                        <button class="px-3 py-2 border rounded-lg bg-yellow-300 text-white" @click="openEdit(address)">
                            Edit
                        </button>
                    </div>
                </td>


            </tr>
            <!-- More rows... -->
            </tbody>
        </table>

        <!-- Modal Box for editing -->
        <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400" v-show="modal.isOpen">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

                <div class="fixed inset-0 transition-opacity">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
                <!-- This element is to trick the browser into centering the modal contents. -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>

                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">

                    <div class="p-6">
                        <form>
                            <div>
                                <div class="mb-4">
                                    <label  class="block text-gray-700 text-sm font-bold mb-2">New Address:</label>
                                    <input v-model="modal.address" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter Title">
                                </div>

                                <input type="hidden" class="hidden" v-model="modal.id">
                            </div>

                            <button type="submit" class="px-3 py-2 border rounded-lg bg-blue-500 text-white" @click="editAddress()">
                                Save
                            </button>

                            <button type="button"  class="px-3 py-2 border rounded-lg bg-blue-500 text-white" @click="closeModal()">
                                Close
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    </app-layout>

</template>

<script>

import AppLayout from '@/Layouts/AppLayout'

export default {
    components: {
        AppLayout
    },
    props: ['addresses','message'],
    data(){
        return {
            // addressesCollection: $this.props.addresses,
            name: 'Bogdan',
            addAddressForm: {
                address: null,

            },
            modal: {
                isOpen: false,
                id: null,
                address: null,
            },
            loadingScreen: false
        }
    },
    methods:{
        addAddress: function(){
            this.$inertia.post('/addresses', {address: this.addAddressForm.address})
            this.addAddressForm.address = null;
        },

        deleteAddress: function(address){
            address._method = "DELETE";
            this.$inertia.post('/addresses/' + address.id, address);
        },

        editAddress: function(){
            let url = '/addresses/' + this.modal.id + '/edit';
            this.$inertia.get(url, {id: this.modal.id , address: this.modal.address});
            this.closeModal();
        },

        closeModal: function(){
            this.modal.isOpen = false;
            this.modal.id = null;
            this.modal.address = null;
        },

        openEdit(address){
            this.modal.isOpen = true;
            this.modal.id = address.id;
            this.modal.address = address.address
            console.log(this.modal.id);
        },
    }
}
</script>
