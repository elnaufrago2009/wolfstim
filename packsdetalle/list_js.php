<script>



  /*
   *
     Archivo que lista todos los detalles de un paquete
   * ***************************************************
   */



  var app = new Vue({

    el: '#app',

    data: {      
      packsdetalles: []
    },

    


    methods: {
      getPacksDetalles: function () {        
        axios.get('./list_pro.php?packid=<?php echo $_GET['packid']?>').then((response) => {
          this.packsdetalles = response.data;
          //console.log(response.data);
        });
      }
    },
    created: function(){
      this.getPacksDetalles();
    }



  })
</script>