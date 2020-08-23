<template>
  <div>
    <input v-model="email" />
    <br />
    <input v-model="password" />
    <br />
    <button @click="loginBtn">ログイン</button>
  </div>
</template>

<script>
import { mapActions } from "vuex";
export default {
  data() {
    return {
      email: "",
      password: ""
    };
  },
  created() {},
  methods: {
    ...mapActions("auth", ["login"]),
    //この部分は、Vuexに書いてStateに格納させる。
    loginBtn: function() {
      let credencial = {
        username: this.email,
        password: this.password
      };
      this.login(credencial);

      // axios
      //   .post("/api/login", {
      //     username: this.email,
      //     password: this.password
      //   })
      //   .then(({ data }) => {
      //     console.log(data.access_token);
      //     const token = data.access_token;
      //     localStorage.setItem("access_token", token);
      //     //ミューテーションズにtokenをコミットする

      //     //ルーターでpushさせて遷移させる
      //     //this.$router.push(name: 'home')
      //   })
      //   .catch(err => console.log(err));
    }
  }
};
</script>