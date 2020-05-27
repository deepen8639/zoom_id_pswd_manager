<style scoped>
.card_width {
  width: 300px;
}

.p-25px {
  padding: 25px;
}

.m-25px {
  margin: 25px;
}

.w-25px {
  width: 25px;
}


.h-25px {
  height: 25px;
}

.w-18px {
  width: 18px;
}


.h-18px {
  height: 18px;
}

.base-card {
  position: relative;
}

.right-bottom {
  position: absolute;
  right: 0;
  bottom: 0;
}


img {
  cursor: pointer;
}
</style>
<template id="">
<div class="container-fluid">
  <div class="row">
    <div class="card_width m-25px" v-for="(dateidpswd, listname) in ZoomData.data">
      <!-- <transition name="modal-fade"> -->
      <inputform-modal v-if="checkmodalonoff(listname)" :listname="listname" :userid="userid" @close="modaloff($event)"></inputform-modal>
      <!-- </transition> -->

      <div class="card">
        <h5 class="card-header"><span v-text="listname"></span>
          <div class="dropdown float-right">
            <button class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            </button>
            <div class="dropdown-menu">
              <button @click="modalon(listname)" class="dropdown-item text-primary">add</button>
              <button @click="deleteList(listname)" class="dropdown-item text-danger">delete</button>
            </div>
          </div>

        </h5>

        <div class="card-body">
          <div class="" v-for="dip in dateidpswd">
            <!-- <transition name="modal-fade"> -->
            <editingform-modal v-if="checkeditingmodal(dip.id)" :id=dip.id :zoomid=dip.zoom_id :zoompswd=dip.zoom_pswd @close="editingmodaloff($event)" />
            <!-- </transition> -->

            <div class="alert alert-secondary base-card">
              <table class="">
                <tr>
                  <td>id</td>
                  <td>{{ dip.zoom_id }}</td>
                </tr>
                <tr>
                  <td>pswd</td>
                  <td>{{ dip.zoom_pswd }}</td>
                </tr>
                <div class="dropdown float-right right-bottom">
                  <img src="../../img/zoomDataManager(menuicon).png" class="rounded img-thumnbnail w-18px h-18px" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-hidden="true">

                  <div class="dropdown-menu">
                    <button @click="transisionZoom(dip.zoom_id,dip.zoom_pswd)" class="dropdown-item text-primary">start Zoom</button>
                    <button @click="editingmodalon(dip.id)" class="dropdown-item">edit</button>
                    <button @click="deleteOneCard(dip.id)" class="dropdown-item text-danger">delete</button>
                  </div>

                </div>

              </table>
            </div>

          </div>

        </div>

        <div class="card-footer">
          <small class="text-muted">{{ }}</small>
        </div>
      </div>

    </div>

  </div><!-- container -->
</div><!-- /.container-fluid-->
</template>
<script type="text/javascript">
import InputformModal from "./Modal/InputformModal.vue";
import EditingformModal from "./Modal/EditingformModal.vue";
import ZoomData from "./ZoomData";
import StripCardbs from "./Card/StripCardbs.vue";
export default {
  components: {
    InputformModal,
    EditingformModal,
    StripCardbs,
  },
  props: {
    userid: String
  },
  data: function() {
    return {
      ZoomData: ZoomData.state.ZoomData,
      modalOnOff: ZoomData.state.ModalOnOff,
      editingModal: ZoomData.state.EditingModal,
      zoomlink: "https://zoom.us/j/",
      // stateZoomData: ZoomData.state.ZoomData,
    }
  },
  methods: {
    deleteList: function(listname) {
      //授業を一つ分削除する。
      let self = this;
      let url = '/api/zoomidpswd/delete/';
      let params = {
        listname: listname,
        userid: self.userid,
      }
      let res = confirm('「' + listname + '」' + "を削除してもよろしいですか？");
      if (res === true) {
        //OKがクリックされたら
        axios.delete(url, {
            data: params
          })
          .then(function(res) {
            console.log('axios delete success!', res.data);
            //ZoomDataを更新する。
            const promiseobj = new Promise(function(resolve, reject) {
              self.getZoomData(self.userid);
              resolve("promise success");
            });
            promiseobj.then(function(message) {
              alert('「' + listname + '」' + "を削除しました")
            });
            // alert('「' + lecturename + '」' + "を削除しました");
          }).catch(function(error) {
            console.log('axios delete failed!', error);
          });
      } else {
        return;
      }
    },

    deleteOneCard: function(id) {
      let self = this;
      let url = '/api/zoomidpswd/delete/';
      let params = {
        id,
      } //deleteするデータを変数へ。
      axios.delete(url, {
          data: params
        })
        .then(function(res) {
          console.log('axios delete success!', res.data);
          //ZoomDataを更新する。
          self.getZoomData(self.userid);
        }).catch(function(error) {
          console.log('axios delete failed!', error);
        })
    },
    // modalfunctionwrapper(lecturename){
    //   this.switchmodalonof(lecturename);
    //   this.getZoomIdPswd(this, this.userid)
    // },
    transisionZoom: function(zoomid, zoompswd) {
      let self = this;
      let link = self.zoomlink + zoomid + "?pwd=" + zoompswd;
      window.open(link, '_blank');
      return;
    },

    editingmodalon: function(id) {
      let self = this;
      self.editingModal.data[id] = true;
    },
    editingmodaloff: function(props) {
      let self = this;
      if (props.updated === true) {
        //個別カード情報のupdateがあった場合
        self.editingModal.data[props.id] = false;
        self.getZoomData(this.userid);
      } else {
        self.editingModal.data[props.id] = false;

      }
    },
    checkeditingmodal: function(id) {
      let self = this;
      return self.editingModal.data[id];
    },
    modalon: function(listname) {
      //modalを表示させる
      let self = this;
      self.modalOnOff.data[listname] = true;
    },
    modaloff: function(props) {
      //modalを消す。
      let self = this;
      console.log(props);
      if (self.modalOnOff.data[props.listname] === true) {
        //モーダルが表示されているなら、閉じる
        self.modalOnOff.data[props.listname] = false;
        //モーダルでpostしていたら、ZoomDataを更新する。
        if (props.posted === true) {
          self.getZoomData(self.userid);
        }
      }
    },
    checkmodalonoff: function(listname) {
      //モーダルの表示チェック
      let self = this;
      if (self.modalOnOff.data[listname] === true) {
        return true;
      } else {
        return false;
      }
    },

    getZoomData: function(userid) {
      //授業カード情報の取得
      let self = this;
      let url = '/api/zoomidpswd/index/';
      axios.get(url + userid)
        .then(function(res) {
          console.log('axios get success!');
          console.log(res.data);
          ZoomData.setZoomData(res.data);

          //モーダルOn,Off切り替えのための各授業ごとの連想配列を用意
          // self.modalonoff = self._setmodalonoff(self.ZoomData.data);
          ZoomData.setModalOnOff(res.data);
          ZoomData.setEditingModal(res.data);
        }).catch(function(error) {
          console.log(error);
        });
    },

  },
  mounted() {
    console.log('IdPswdListComponent mounted');
    this.getZoomData(this.userid);
    // console.log(this.ZoomData);
    // this.zd = ZoomDataComponent.returnZoomData(this.userid);
  }
}
</script>
