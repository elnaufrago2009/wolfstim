<script>
  var app = new Vue({
    el: '#app',
    data: {      
      pack_detalle: {
        id_pack: '<?php echo $_GET['packid'] ?>'
      }
    },
    methods: {
      enviar: function (pack_detalle) {     
        //console.log(pack_detalle);                 
        axios.post('./new_pro.php', pack_detalle).then((response) => {

          if (response.data == 'ok'){
            window.location.href = "/packsdetalle/list.php?packid=<?php echo $_GET['packid']?>";
            console.log('ok');
          }          
          
        })        
      }
    }
  })
</script>