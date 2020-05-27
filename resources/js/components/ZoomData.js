//他のコンポーネントで、ZoomDataについてpostを行うコンポーネントは全て、このファイルをimportする。

//ZoomDataに変更があった場合は、必ず下記のsetZoomDataを呼び、このファイルで定義されたZoomDataにも変更を共有する。
//それにより、このファイルをimportした全てのコンポーネント間でZoomDataの変更を共有する。

export default {
  state: {
    //他のコンポーネントはこれを参照する。
    ZoomData: {
      data: false,
      required: false,
    },
    ModalOnOff: {
      data: false,
    },
    EditingModal: {
      data: false,
    }
  },
  setZoomData(zoomdata) {
    //このファイル内のZoomDataの書き換えは、
    //このファイルをimportしているコンポーネント間で同期できる。
    this.state.ZoomData.data = zoomdata;
  },
  setModalOnOff(zoomdata) {
    //モーダルOn,Off切り替えのための連想配列を用意
    let monoff = {};
    for (let key in zoomdata) {
      monoff[key] = false
    }
    this.state.ModalOnOff.data = monoff;
  },
  setEditingModal(zoomdata) {
    //個々のカードのモーダルon,off切り替えのための連想配列
    let emonoff = {};
    for (let key in zoomdata) {
      for (let k  in zoomdata[key]) {
        emonoff[zoomdata[key][k]['id']] = false
      }
    }
    this.state.EditingModal.data = emonoff;
  }
}
