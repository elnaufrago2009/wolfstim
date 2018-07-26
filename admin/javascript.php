<script>
  var app = new Vue({
    el: '#app',
    data: {
      packs: {},
      packsend: {},
      previous: false
    },
    methods: {
      getDetalle: function (pack_id,user_id) {

        // obtiene el pack
        axios.get('./get_pack_pro.php?pack_id=' + pack_id + '&user_id=' + user_id).then((response) => {
          
          if(response.data.envio == 'previous'){
            this.previous = true;
          }
          this.packsend = response.data;  
          //console.log(response.data);
        });

        //activa el modal  
        $("#modal_add_pack").modal('show');
        
      },
      getPacks: function () {        
        axios.get('./pack_list_pro.php').then((response) => {
          this.packs = response.data;
          //console.log(response.data);
        });
      },
      getOrder: function(pack_id,user_id){
        axios.get('./get_order_pro.php?pack_id=' + pack_id + '&user_id=' + user_id).then((response)=>{
          
          //console.log('se ejecuto getOrder');
        });
      }
    },    
    created: function(){
      this.getPacks();
    }
  })
</script>