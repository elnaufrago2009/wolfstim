<script>
  var app = new Vue({
    el: '#app',
    data: {
      packs: {},
      user_packs: {},
      packsend: {},
      guardar: false,
      formInforma: true
    },
    methods: {
      getDetalle: function (pack_id,user_id) {
        // obtiene el pack
        axios.get('./get_pack_pro.php?pack_id=' + pack_id + '&user_id=' + user_id).then((response) => {          
          if(response.data.guardar == 'no'){
            this.guardar = true;
          }
          this.packsend = response.data;          
          console.log(response.data);
        });

        //activa el modal  
        $("#modal_add_pack").modal('show');
        
      },
      getPacks: function () {        
        axios.get('./pack_list_pro.php').then((response) => {
          this.packs = response.data;          
        });
      },
      getOrder: function(pack_id,user_id){
        axios.get('./get_order_pro.php?pack_id=' + pack_id + '&user_id=' + user_id).then((response)=>{
          
          //console.log('se ejecuto getOrder');
        });
      },
      getUserOrders: function(){
        axios.get('./get_users_orders.php?user_id=<?php echo $_SESSION['userid'] ?>').then(response=>{
          this.user_packs = response.data;
          console.log(this.user_packs);
        });
      },
      getFormSend: function(){
        axios.get('./form_informa_pro.php?userid=<?php echo $_SESSION['userid'] ?>').then(response => {
          this.formInforma = response.data;
          console.log(response.data);
        });
      }
    },    
    created: function(){
      this.getPacks();
      this.getUserOrders();
      this.getFormSend();
    }
  })
</script>