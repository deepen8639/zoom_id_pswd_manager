<template>
<div>
  <!-- <transition name="modal-fade"> -->

  <div @click.self="emitCloseAndLecNamePosted(listname,false)" class="modal show" id="InputFormModal" tabindex="-1" role="dialog" aria-labelledby="InputFormModalLabel">
    <div class="modal-dialog" role="document">
      <div class="row justify-content-center">

        <div class="modal-content col-md-8">
          <div class="modal-header">
            <a @click="emitCloseAndLecNamePosted(listname,false)" class="close">
              <span aria-hidden="true">&times;</span>
            </a>
          </div>
          <div class="modal-body">
            <table class="">
              <tr>
                <td class="text-right">Name:</td>
                <td class="listname">{{ listname }}</td>
              </tr>
              <!-- <tr>
                <td class="text-right">date:</td>
                <td><input type="date" class="form-control" v-model="zoomdate"></td>
              </tr> -->
              <tr>
                <td class="text-right">id:</td>
                <td><input type="text" class="form-control" v-model="zoomid"></td>
              </tr>
              <tr>
                <td class="text-right">pswd:</td>
                <td><input type="text" class="form-control" v-model="zoompswd"></td>
              </tr>
            </table>
          </div>
          <div class="modal-footer">
            <a @click="emitCloseAndLecNamePosted(listname,false)" class="btn btn-secondary" tabindex="">Close</a>
            <button class="btn btn-primary" @click="postZoomIdPswd(zoomid,zoompswd,userid,listname)">保存</button>
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
  data: function() {
    return {
      zoomdate: '',
      zoomid: '',
      zoompswd: '',
    }
  },
  props: {
    listname: String,
    userid: String,
  },
  methods: {
    postZoomIdPswd: function(zoomid, zoompswd, userid, listname) {
      // lecturename,zoom_id,zoom_date,zoom_pswd,useridをpostし、DBに保存する。
      let self = this;
      let url = '/api/zoomidpswd/create/card';
      let zoomdata = {
        zoomid,
        zoompswd,
        userid,
        listname
      } //postするデータを変数へ
      axios.post(url, zoomdata)
        .then(function(res) {
          console.log('axios post success!', res.data);
          //モーダルをクローズ&DBに情報を送ったことを通知
          // self.$emit('close',{lecturename: self.lecturename, posted: true});
          self.emitCloseAndLecNamePosted(self.listname, true);
        }).catch(function(error) {
          console.log('axios post fail!', error);
        });
    },

    emitCloseAndLecNamePosted: function(listname, posted) {
      //$emit()をラップし、二つの引数を持たせる。
      let self = this;
      self.$emit('close', {
        listname: listname,
        posted: posted
      });
    },

  },
  mounted() {}
}
</script>

<style scoped>
.modal {
  display: block;
  z-index: 1500;
}
</style>
