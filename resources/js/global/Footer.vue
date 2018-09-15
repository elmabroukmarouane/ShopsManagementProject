<template>
     <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="w-100 clearfix text-center">
            <p class="footer-text">{{ this.date_now | moment }} - Shops Management Project by <a href="mailto:elmabroukmarouane@gmail.com">Marouane EL MABROUK</a>.</p>
          </div>
        </footer>
        <!-- partial -->
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