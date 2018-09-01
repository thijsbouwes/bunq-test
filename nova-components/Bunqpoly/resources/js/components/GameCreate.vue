<template>
    <div>
        <div class="relative">
            <h1 class="mb-3 text-90 font-normal text-2xl">New Game</h1>
            <div class="card overflow-hidden">
                <form v-on:submit.prevent="onSubmit">
                    <div>
                        <div class="flex border-b border-40">
                            <div class="w-1/5 px-8 py-6">
                                <label class="inline-block text-80 h-9 pt-2" for="Name">Name</label>
                                <p class="text-sm leading-normal text-80 italic"></p>
                            </div>
                            <div class="w-1/2 px-8 py-6">
                                <input v-model="form.name" id="Name" placeholder="Name" type="text" class="w-full form-control form-input form-input-bordered" required>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="flex border-b border-40">
                            <div class="w-1/5 px-8 py-6">
                                <label class="inline-block text-80 h-9 pt-2" for="price">price</label>
                                <p class="text-sm leading-normal text-80 italic"></p>
                            </div>
                            <div class="w-1/2 px-8 py-6">
                                <input v-model="form.price" id="price" min="0" max="100" step="0.01" placeholder="price" type="number" class="w-full form-control form-input form-input-bordered" required>
                            </div>
                        </div>
                    </div>
                    <div class="bg-30 flex px-8 py-4">
                        <router-link to="/bunqpoly" class="ml-auto btn btn-default btn-primary mr-3">Cancel</router-link>
                        <button type="submit" class="btn btn-default btn-primary">Create Game</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                games: [],
                form: {
                    name: "",
                    price: ""
                }
            }
        },

        methods: {
            onSubmit() {
                Nova.request().post('/nova-vendor/bunqpoly/games', this.form)
                    .then(response => {
                        this.$router.push({ name: 'bunqpoly-join', params: { id: response.data.id }});
                    })
            }
        },
    }
</script>

<style>
    /* Scoped Styles */
</style>
