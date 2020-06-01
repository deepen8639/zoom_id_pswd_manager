<template>
<div>
  <!-- <transition> -->

  <div @click.self="emitCloseAndFlagUpdated(id,false)" class="modal show" id="InputFormModal" tabindex="-1" role="dialog" aria-labelledby="InputFormModalLabel">
    <div class="modal-dialog" role="document">
      <div class="row justify-content-center">

        <div class="modal-content col-md-8">
          <div class="modal-header">
            <a @click="emitCloseAndFlagUpdated(id,false)" class="close">
              <span aria-hidden="true">&times;</span>
            </a>
          </div>
          <div class="modal-body">
            <table class="">

              <!-- <tr>
                <td class="text-right">date:</td>
                <td><input type="date" class="form-control" v-model="zoomdate"></td>
              </tr> -->
              <tr>
                <td class="text-right">id:</td>
                <td><input type="text" class="form-control" v-model="privatezoomid"></td>
              </tr>
              <tr>
                <td class="text-right">pswd:</td>
                <td><input type="text" class="form-control" v-model="privatezoompswd"></td>
              </tr>
            </table>
          </div>
          <div class="modal-footer">
            <a @click="emitCloseAndFlagUpdated(id,false)" class="btn btn-secondary" tabindex="">Close</a>
            <button class="btn btn-primary" @click="updateOneCardInfo(privatezoomid,privatezoompswd,id)">保存</button>
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
      privatezoomid: this.zoomid,
      privatezoompswd: this.zoompswd,
    }
  },
  props: {
    zoomid: String,
    zoompswd: String,
    id: Number
  },
  methods: {
    emitCloseAndFlagUpdated: function(id, updated) {
      //$emit("close")し。
      let self = this;
      self.$emit('close', {
        id: id,
        updated: updated
      });
    },
    updateOneCardInfo: function(zoomid, zoompswd, id) {
      let self = this;
      let url = '/api/zoomidpswd/update'
      let params = {
        zoomid,
        zoompswd,
        id
      }
      axios.put(url, params)
        .then(function(res) {
          console.log("axios put success!", res.data);
        }).catch(function(error) {
          console.log("axios put failed!", error);
        })

      self.emitCloseAndFlagUpdated(id, true);
    },


  },
  mounted() {}
}
</script>

<style scoped>
.modal {
  display: block;
}
</style>
