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
              <h3 class="page-header">Registro de Permisos</h3>
            </slot>
          </div>

          <div class="modal-body">
            <slot name="body">
              <form v-on:submit.prevent="guardarElemento()">
                <div class="form-group">
                  <label for="name">Nombre: </label>
                  <input type="text" id="name" name="name" class="form-control" required v-model="elemento.name"/>
                </div>
                <div class="form-group">
                  <label for="slug">Slug: </label>
                  <input type="text" id="slug" name="slug" class="form-control" required v-model="elemento.slug"/>
                </div>
                <div class="form-group">
                  <label for="description">Descripción: </label>
                  <textarea id="description" name="description" class="form-control" required v-model="elemento.description"></textarea>
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
      axios.post('/api/permiso', {
        name: this.elemento.name,
        slug: this.elemento.slug,
        description: this.elemento.description,
        status: this.elemento.status
      })
      .then( (response) => {
        console.log(response);
        this.$emit('guardarElemento');
        permisoApp.getPermissions();
        permisoApp.showModal = false;
      })
      .catch((error) => {
        console.log(error);
      });

      permisoApp.limpiarDatos();
    }
  }
});
