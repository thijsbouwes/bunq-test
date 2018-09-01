<template>
    <div>
        <div class="flex justify-between">
            <div class="relative h-9 mb-6">
                <heading class="mb-6">Join {{ this.game.name }}</heading>
            </div>
            <span class="ml-auto mb-6">
                <button type="submit" class="btn btn-default btn-primary" :disabled="usersPayed" :class="{ 'opacity-50 cursor-not-allowed': usersPayed }">Start Game</button>
            </span>
        </div>

        <div class="overflow-hidden overflow-x-auto relative bg-white">
            <table cellpadding="0" cellspacing="0" data-testid="resource-table" class="table w-full">
                <thead>
                <tr>
                    <th class="text-left"><span class="cursor-pointer inline-flex items-center">ID</span></th>
                    <th class="text-left"><span>name</span></th>
                    <th class="text-left"><span>payed</span></th>
                </tr>
                </thead>
                <tbody>
                    <tr v-for="user in game.users">
                        <td><span class="whitespace-no-wrap text-left">{{ user.id }}</span></td>
                        <td><span class="whitespace-no-wrap text-left">{{ user.name }}</span></td>
                        <td><div class="flex items-center text-left">{{ user.pivot.payed }}</div></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                game_id: this.$route.params.id,
                game: {
                    name: "",
                    users: []
                },
                is_creator: false,
            }
        },

        computed: {
            usersPayed() {
                let payedUsers = this.game.users.filter(user => {
                    return user.pivot.payed === true;
                });

                return payedUsers.length < 2;
            }
        },

        mounted() {
            Nova.request().get('/nova-vendor/bunqpoly/games/' + this.game_id)
                .then(response => {
                    this.game = response.data;
                })
        },

        methods: {
            onSubmit() {
            }
        },

    }
</script>

<style>
    /* Scoped Styles */
</style>
