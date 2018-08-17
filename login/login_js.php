<script>
  var app = new Vue({
    el: '#app',
    data: {      
      login: {},
      error: false
    },
    methods: {
      enviar: function (login) {     
        //console.log(login);        
        axios.post('./login_pro.php', login).then((response) => {
          //console.log(response.data);
          
          if (response.data == 'ok'){
            window.location.href = "/admin/";
          }else{
            this.error = true;
            //window.location.href = "/login/login.php?err=1";
          }
          
          
        })

      }
    }
  })
</script>