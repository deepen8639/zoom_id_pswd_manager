<template>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header p-1">
          <div class="dropdown float-right">
            <!-- <button type="button" class="btn btn-primary">ボタン</button> -->
            <button class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <!-- <span class="sr-only">ドロップダウンの切替</span> -->
            </button>
            <div class="dropdown-menu">
              <button class="dropdown-item text-primary">start Zoom</button>
              <button class="dropdown-item">edit</button>
              <button @click="deleteOneCard(dbid)"class="dropdown-item text-danger">delete</button>
            </div>
            <!-- </div>
            </div> -->
          </div>
        </div>

        <div class="card-body">
          <!-- <p>body</p> -->
          <table>
            <tr>
              <td class="align-baseline">date</td>
              <td class="align-center">{{ date }}</td>
            </tr>
            <tr>
              <td class="align-baseline">id</td>
              <td align-center>{{ zoomid }}</td>
            </tr>
            <tr>
              <td class="align-baseline">pswd</td>
              <td align-center>{{ pswd }}</td>
            </tr>
          </table>
        </div>
        <!-- <div class="card-footer">
          <p>footer</p>
        </div> -->
      </div>
    </div>
  </div>
</div>
</template>

<script type="text/javascript">
export default {
  data: function() {
    return {

    }
  },
  props: {
    date: String,
    zoomid: String,
    pswd: String,
    dbid: Number,
  },
  methods: {
    deleteOneCard: function(id) {
      let self = this;
      let url = '/api/zoomidpswd/delete';
      let params = {
        id,
      } //deleteするデータを変数へ。
      axios.delete(url, {
          data: params
        })
        .then(function(res) {
          console.log('axios delete success!', res.data);
          //ZoomDataを更新する。
          // self.getZoomData(self, self.userid);
          self.$emit('deleted');
        }).catch(function(error) {
          console.log('axios delete failed!', error);
        })
    },
  },
  mounted() {}
}
</script>

<style>

</style>
