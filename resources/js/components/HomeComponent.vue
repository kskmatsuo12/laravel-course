<template>
  <div>
    <p v-for="(user,key) in users" :key="key">{{user.name}}</p>
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