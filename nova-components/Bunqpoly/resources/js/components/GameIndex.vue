<template>
    <div>
        <div class="flex justify-between">
            <div class="relative h-9 mb-6">
                <heading class="mb-6">Bunqpoly</heading>
            </div>
            <span class="ml-auto mb-6">
                <router-link to="/bunqpoly/create" class="btn btn-default btn-primary">Create Game</router-link>
            </span>
        </div>

        <div class="overflow-hidden overflow-x-auto relative bg-white">
            <table cellpadding="0" cellspacing="0" data-testid="resource-table" class="table w-full">
                <thead>
                    <tr>
                        <th class="text-left"><span class="cursor-pointer inline-flex items-center">ID</span></th>
                        <th class="text-left"><span class="cursor-pointer inline-flex items-center">Name</span></th>
                        <th class="text-left"><span>price</span></th>
                        <th class="text-left"><span>Status</span></th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                <tr v-for="game in games">
                    <td><span class="whitespace-no-wrap text-left">{{ game.id }}</span></td>
                    <td><span class="whitespace-no-wrap text-left">{{ game.name }}</span></td>
                    <td><span class="whitespace-no-wrap text-left">$ {{ game.price }}</span></td>
                    <td><div class="flex items-center text-left"><span class="mr-3 text-60"><svg viewBox="0 0 120 30" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="mx-auto block" style="width: 30px;"><circle cx="15" cy="15" r="13.5317"><animate attributeName="r" from="15" to="15" begin="0s" dur="0.8s" values="15;9;15" calcMode="linear" repeatCount="indefinite"></animate><animate attributeName="fill-opacity" from="1" to="1" begin="0s" dur="0.8s" values="1;.5;1" calcMode="linear" repeatCount="indefinite"></animate></circle><circle cx="60" cy="15" r="10.4683" fill-opacity="0.3"><animate attributeName="r" from="9" to="9" begin="0s" dur="0.8s" values="9;15;9" calcMode="linear" repeatCount="indefinite"></animate><animate attributeName="fill-opacity" from="0.5" to="0.5" begin="0s" dur="0.8s" values=".5;1;.5" calcMode="linear" repeatCount="indefinite"></animate></circle><circle cx="105" cy="15" r="13.5317"><animate attributeName="r" from="15" to="15" begin="0s" dur="0.8s" values="15;9;15" calcMode="linear" repeatCount="indefinite"></animate><animate attributeName="fill-opacity" from="1" to="1" begin="0s" dur="0.8s" values="1;.5;1" calcMode="linear" repeatCount="indefinite"></animate></circle></svg></span> <span class="">pending</span></div></td>
                    <td class="td-fit text-right pr-6">
                        <span>
                            <a @click="joinGame(game)" class="cursor-pointer text-70 hover:text-primary mr-3" data-testid="games-items-0-view-button" dusk="2-view-button" title="View">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="18" viewBox="0 0 22 16" aria-labelledby="view" role="presentation" class="fill-current"><path d="M16.56 13.66a8 8 0 0 1-11.32 0L.3 8.7a1 1 0 0 1 0-1.42l4.95-4.95a8 8 0 0 1 11.32 0l4.95 4.95a1 1 0 0 1 0 1.42l-4.95 4.95-.01.01zm-9.9-1.42a6 6 0 0 0 8.48 0L19.38 8l-4.24-4.24a6 6 0 0 0-8.48 0L2.4 8l4.25 4.24h.01zM10.9 12a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"></path></svg>
                            </a>
                        </span>
                    </td>
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
            games: []
        }
    },

    mounted() {
        Nova.request().get('/nova-vendor/bunqpoly/games')
            .then(response => {
                this.games = response.data;
            })
    },

    methods: {
        joinGame(game) {
            Nova.request().post('/nova-vendor/bunqpoly/games/' + game.id + '/join')
                .then(response => {
                    this.$router.push({ name: 'bunqpoly-join', params: { id: game.id }});
                });
        }
    }
}
</script>

<style>
    /* Scoped Styles */
</style>
