<template>
    <div>
        APIHome
    </div>
</template>

<script>
export default {
    data() {
        return {
            users: []
        };
    },
    created() {
        this.getUser();
    },
    methods: {
        getUser: function() {
            axios.get("/test/get_user").then(res => {
                this.users = res.data.users;
            });
        }
    }
};
</script>
