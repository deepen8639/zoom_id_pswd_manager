<template id="">
<div class="container-fluid">
  <!-- <div class="card-deck"> -->
  <div class="row">
    <div class="offset-4 col-md-4">

      <!-- /.row  -->
    </div>
  </div>
</div><!-- /.container-fluid-->
</template>
<script type="text/javascript">
export default{
  props: {
    userinfo: new Object()
  },
  mounted(){
    console.log('IdPswdHomeComponent mounted');
    this.$router.push({name:'zoom_id_pswd.list', params:{userid: this.userinfo.userid}});
  }
}
</script>
