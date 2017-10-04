Vue.component('modal-create', {
  props: ['elemento'],
  template: `
  <transition name="modal">
    <div class="modal-mask">
      <div class="modal-wrapper">
        <div class="modal-container">
          <span class="btn btn-danger fa fa-times pull-right" @click="$emit('close')"></span>
          <div class="modal-header">
            <slot name="header">
              <h3 class="page-header">Registro de Usuarios</h3>
            </slot>
          </div>

          <div class="modal-body">
            <slot name="body">
              <form v-on:submit.prevent="guardarElemento()">
                <div class="form-group">
                  <label for="empleado_id">Número de Empleado: </label>
                  <input type="text" id="empleado_id" name="empleado_id" class="form-control" required v-model="elemento.empleado_id"/>
                </div>
                <div class="form-group">
                  <label for="name">Nombre: </label>
                  <input type="text" id="name" name="name" class="form-control" required v-model="elemento.name"/>
                </div>
                <div class="form-group">
                  <label for="email">Correo Institucional: </label>
                  <textarea id="email" name="email" class="form-control" required v-model="elemento.email"></textarea>
                </div>
                <div class="form-group">
                  <label for="status">
                    Activo: <input id="status" name="status" type="checkbox" v-model="elemento.status">
                  </label>
                </div>
                <input type="submit" @click="$emit('guardarElemento')" class="btn btn-success btn-lg fa fa-save" value="Guardar"/>
              </form>
            </slot>
          </div>

          <div class="modal-footer">
            <slot name="footer">

            </slot>
          </div>
        </div>
      </div>
    </div>
  </transition>
  `,
  methods:{
    guardarElemento: function(){
      axios.post('/api/usuario', {
        empleado_id: this.elemento.empleado_id,
        name: this.elemento.name,
        email: this.elemento.email,
        status: this.elemento.status
      })
      .then( (response) => {
        console.log(response);
        this.$emit('guardarElemento');
        usuarioApp.getUsers();
        usuarioApp.showModal = false;
      })
      .catch((error) => {
        console.log(error);
      });

      usuarioApp.limpiarDatos();
    }
  }
});
