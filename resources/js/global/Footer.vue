<template>
    <!--Start footer-->
    <footer class="footer">
        <div class="container">
          <div class="text-center">
            <p class="footer-text">{{ this.date_now | moment }} - Shops Management Project by <a href="mailto:elmabroukmarouane@gmail.com">Marouane EL MABROUK</a>.</p>
          </div>
        </div>
      </footer>
    <!--End footer-->
</template>

<script>
export default {
  data() {
    return {
      date_now: new Date()
    };
  },
  mounted() {},
  methods: {
    moment: function() {
      return moment();
    }
  },
  filters: {
    moment: function(date) {
      if (moment(date).format("YYYY") != "2018") {
        return "2018 - " + moment(date).format("YYYY");
      }
      return moment(date).format("YYYY");
    }
  }
};
</script>