<template>
<div>
  <!-- <transition> -->

  <div @click.self="$emit('close',false)" class="modal show" id="InputFormModalheader" tabindex="-1" role="dialog" aria-labelledby="InputFormModalheaderLabel">
    <div class="modal-dialog" role="document">
      <div class="row justify-content-center">

        <div class="modal-content col-md-8">
          <div class="modal-header">
            <a @click="$emit('close',false)" class="close">
              <span aria-hidden="true">&times;</span>
            </a>
          </div>
          <div class="modal-body">
            <table>
              <tr>
                <td class="text-right">Name:</td>
                <td class="listname"><input type="text" class="form-control" v-model="listname"></td>
              </tr>
              <!-- <tr>
                <td class="text-right">date:</td>
                <td><input type="date" class="form-control" v-model="zoomdate"></td>
              </tr> -->
              <!-- <tr>
                <td class="text-right">id:</td>
                <td><input type="text" class="form-control" v-model="zoomid"></td>
              </tr>
              <tr>
                <td class="text-right">pswd:</td>
                <td><input type="text" class="form-control" v-model="zoompswd"></td>
              </tr> -->
            </table>
          </div>
          <div class="modal-footer">
            <a @click="$emit('close', false)" class="btn btn-secondary" tabindex="">Close</a>
            <button class="btn btn-primary" @click="postZoomIdPswd(userid,listname)">保存</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal-backdrop fade show" />
  <!-- </transition> -->
</div>
</template>

<script type="text/javascript">
export default {
  name: 'InputformModalheader',
  data: function() {
    return {
      listname: '',
    }
  },
  props: {
    userid: String
  },
  methods: {
    postZoomIdPswd: function(userid, listname) {
      // lecturename,zoom_id,zoom_date,zoom_pswd,useridをpostし、DBに保存する。
      let self = this;
      let url = '/api/zoomidpswd/create/list';
      let zoomdata = {
        userid,
        listname
      } //postするデータを変数へ
      axios.post(url, zoomdata)
        .then(function(res) {
          console.log('axios post success!', res.data);
          self.$emit('close', true); //モーダルをクローズし、postがあったことを通知。
        }).catch(function(error) {
          console.log('axios post fail!', error);
        });
    },

  },
  mounted() {
  }
}
</script>

<style scoped>
.modal {
  display: block;
}
</style>
