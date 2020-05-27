<style media="screen">
.card_width {
  width: 300px;
}

.p-25px {
  padding: 25px;
}

.m-25px {
  margin: 25px;
}
</style>
<template>
<div class="container-fluid bg-dark mb-3">
  <div class="container">
    <nav class="navbar navbar-dark">
      <span class="navbar-brand mb-0 h1">Zoom-id-pswd-manager</span>
      <div class="row">
        <!-- <router-link v-bind:to="{name: 'constitution.home'}">
                    <button class="btn btn-success">home</button>
                    </router-link> -->
          <button class="btn btn-lg btn-primary" @click="modalon" tabindex="">✙</button>
          <h5>
          <!-- <div class="card_width m-25px"> -->
          <!-- <inputform-modal v-if="InputFormModal" :userid="userid" @close="modaloff"></inputform-modal> -->
          <inputform-modalheader v-if="InputFormModal" :userid="userid" @close="modaloff"></inputform-modalheader>
        </h5>

        <!-- </div> -->

        <button class="btn btn-success" v-on:click="axiosLogout">logout</button>
      </div>
    </nav>
  </div>
</div>
</template>

<script type="text/javascript">
import InputformModalheader from "./Modal/InputformModalheader.vue";
import ZoomData from "./ZoomData"; //ZoomDataをimport
import InputformModal from "./Modal/InputformModal.vue";

export default {
  components: {
    InputformModalheader,
    InputformModal,
  },

  data: function() {
    return {
      InputFormModal: false,
      userid: '',
    }
  },
  props: {
    logout: String,
    userinfo: new Object()
  },
  methods: {
    modalon: function() {
      this.InputFormModal = true;
    },
    modaloff: function(posted) {
      //postedでpostがあったかどうかをチェック
      if (posted) {
        //ZoomDataを更新したうえでモーダルを閉じる
        this.updateZoomData(this.userid);
        this.InputFormModal = false;
      } else {
        //単にモーダルを閉じる
        this.InputFormModal = false;
      }
    },
    updateZoomData: function(userid) {
      //授業カード情報の取得
      //modalからの入力とpostでDBが更新されたので、そのZoomDataの変更を各コンポーネント間で同期させる
      let url = '/api/zoomidpswd/index/';
      axios.get(url + userid)
        .then(function(res) {
          //ここでのZoomDataはimportしたZoomData
          ZoomData.setZoomData(res.data);
          ZoomData.setModalOnOff(res.data);
          console.log('axios get success!');
        }).catch(function(error) {
          console.log(error.message);
        });
    },

    axiosLogout() {
      axios.post(this.logout)
        .then(function(response) {
          console.log(response)
          window.location.href = '/'
        }.bind(this))

        .catch(function(error) {
          console.log(error)
          window.location.href = '/'

          if (error.response) {
            if (error.response.status) {
              if (error.response.status == 401 || error.response.status == 419) {
                var parser = new URL(this.logout)
                location.href = parser.origin

              }
            }
          }
        }.bind(this))
    },

  }, //...methods
  mounted() {
    console.log('HeaderComponent mounted.');
    this.userid = this.userinfo["userid"];
    // let self = this;
    // self.userid = self.userinfo["userid"];
    // console.log(self.userinfo["userid"]);
    // console.log(self.logout);
  },
}
</script>
