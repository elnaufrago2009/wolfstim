<script>
  var app = new Vue({

    el: '#app',

    data: {      
      pack: {}
    },

    


    methods: {


      

      enviar: function (pack) {
        //console.log(pack);        
        axios.post('./new_pro.php', pack).then((response) => {
          
          if (response.data == 'ok'){
            window.location.href = "/packs/list.php";
            console.log('ok');
          }          
          
        })
      }





    }



  })
</script>