var usuarioApp = new Vue({
  el:"#index-usuarios",
  created: function(){
    this.getUser();
  },
  data:{
    usuarios:[],
    showModal: false,
    showModalDelete:false,
    showModalEdit:false,
    usuario:{
        id: 0,
        empleado_id:"",
        name:"",
        email:"",
        status:false
      },
    usuarioCreate:{
        empleado_id:"",
        nombre:"",
        email:"",
        status:false
      }
  },
  methods: {
    getUsers: function(){
      axios.get('/api/usuario')
        .then( (response) => {
          this.usuarios = response.data;
      });
    },
    creaUsuario: function () {
      this.showModal = true;
    },
    editarUsuario: function (elemento) {
      this.showModalEdit = true;
      this.usuario = elemento;
    },
    eliminarUsuario: function (elemento) {
      this.showModalDelete = true;
      this.usuario = elemento;
    },
    limpiarDatos: function(){
      this.usuarioCreate.empledo_id = "";
      this.usuarioCreate.name = "";
      this.usuarioCreate.email = "";
      //this.permisoCreate.level = false;
    }

  }
});
