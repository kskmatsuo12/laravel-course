<template>
    <div>
        <h1>APIユーザー登録</h1>
        name:
        <input v-model="name" />
        <br />email:
        <input v-model="email" />
        <br />password:
        <input v-model="password" />
        <br />password（再入力)
        <input v-model="password_confirmation" />
        <br />
        <button @click="register">登録</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            name: "",
            email: "",
            password: "",
            password_confirmation: ""
        };
    },
    methods: {
        register: function() {
            axios
                .post("register", {
                    name: this.name,
                    email: this.email,
                    password: this.password,
                    password_confirmation: this.password_confirmation
                })
                .then(({ data }) => {
                    console.log(data);
                });
        }
    }
};
</script>
