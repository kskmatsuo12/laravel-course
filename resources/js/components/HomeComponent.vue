<template>
  <div>
    <div>Tst1</div>
    <div>Tst1</div>
    <div>Tst1</div>
    <div>Tst1</div>
    <div>Tst1</div>
    <div>Tst1</div>
    <div>Tst1</div>
    <div>Tst1</div>
    <div>Tst1</div>
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
      axios.get("/test/get_user").then(res => console.log(res));
    }
  }
};
</script>