<script>
  var app = new Vue({

    el: '#app',

    data: {      
      pack: {}
    },

    


    methods: {


      

      enviar: function (pack) {
        //console.log(pack);        
        axios.post('/packs/new_procesa.php', pack).then((response) => {
          /*
          if (response.data == 'ok'){
            console.log('ok')
          }
          */
          console.log(response.data);
          //window.location.href = "/";
        })
      }





    }



  })
</script>