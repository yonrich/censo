var roleApp = new Vue({
  el:"#index-role",
  created: function(){
    this.getRoles();
  },
  data:{
    url:"/api/role",
    roles:[],
    showModal: false,
    showModalDelete:false,
    showModalEdit:false,
    role:{
        id: 0,
        name:"",
        slug:"",
        description:"",
        level:0
    },
    roleCreate:{
        name:"",
        slug:"",
        description:"",
        level:0
    }
  },
  methods: {
    getRoles: function(){
      axios.get('/api/role')
        .then( (response) => {
          this.roles = response.data;
      });
    },
    crear: function () {
      this.showModal = true;
    },
    editar: function (elemento) {
      this.showModalEdit = true;
      this.role = elemento;
    },
    eliminar: function (elemento) {
      this.showModalDelete = true;
      this.role = elemento;
    },
    limpiarDatos: function(){
      this.roleCreate.name = "";
      this.roleCreate.slug = "";
      this.roleCreate.description = "";
      this.roleCreate.level = 0;
    }
  }
});
