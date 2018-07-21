<script>
  var app = new Vue({

    el: '#app',

    data: {      
      packs: []
    },

    


    methods: {
      getPacks: function () {        
        axios.get('./list_pro.php').then((response) => {
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