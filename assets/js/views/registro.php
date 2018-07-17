<script>
  var app = new Vue({
    el: '#app',
    data: {
      message: 'Hello Vue!',
      registro: {}
    },
    methods: {
      enviarRegistro: function (registro) {
        axios.post('/registro/procesa_registro.php', registro).then((response) => {
          if (response.data == 'ok'){

          }
          console.log(response.data);
          window.location.href = "/";
        })

      }
    }
  })
</script>