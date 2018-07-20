<script>
  var app = new Vue({

    el: '#app',

    data: {      
      packs: []
    },

    


    methods: {
      getPacks: function () {        
        axios.get('./packs_procesa.php').then((response) => {
          this.packs = response.data;
          console.log(response.data);
        });
      }
    },
    created: function(){
      this.getPacks();
    }



  })
</script>