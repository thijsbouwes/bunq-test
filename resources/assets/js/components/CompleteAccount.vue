<template>
    <div class="container">
        <div class="row justify-content-center">
            <font-awesome-icon
                icon="spinner"
                spin size="lg"
                v-show="loading"
            />
            <div class="alert alert-danger" v-show="error !== false">
                <strong>Error!</strong> {{ error }}
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['code'],

        data() {
            return {
                loading: true,
                error: false,
            }
        },

        mounted() {
            console.log('Component mounted.' + this.code);

            axios.post('/api/complete-account', {code: this.code})
                .then(response => {
                    this.loading = false;
                    console.log(response.data);
                })
                .catch(error => {
                    this.loading = false;
                    this.error = error.response.data.error
                });
        }
    }
</script>
