var permisoApp = new Vue({
  el:"#index-permisos",
  created: function(){
    this.getPermissions();
  },
  data:{
    permisos:[],
    showModal: false,
    showModalDelete:false,
    showModalEdit:false,
    permiso:{
        id: 0,
        name:"",
        slug:"",
        description:"",
        status:false
      },
    permisoCreate:{
        name:"",
        slug:"",
        description:"",
        status:false
      }
  },
  methods: {
    getPermissions: function(){
      axios.get('/api/permiso')
        .then( (response) => {
          this.permisos = response.data;
      });
    },
    creaPermiso: function () {
      this.showModal = true;
    },
    editarPermiso: function (elemento) {
      this.showModalEdit = true;
      this.permiso = elemento;
    },
    eliminarPermiso: function (elemento) {
      this.showModalDelete = true;
      this.permiso = elemento;
    },
    limpiarDatos: function(){
      this.permisoCreate.name = "";
      this.permisoCreate.slug = "";
      this.permisoCreate.description = "";
      this.permisoCreate.level = false;
    }

  }
});
