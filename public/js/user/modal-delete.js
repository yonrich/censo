Vue.component('modal-delete', {
  props: ['elemento'],
  template: `
  <transition name="modal">
    <div class="modal-mask">
      <div class="modal-wrapper">
        <div class="modal-container">
          <span class="btn btn-danger fa fa-times pull-right" @click="$emit('close')"></span>
          <div class="modal-header">
            <slot name="header">
              <h3 class="page-header">Eliminación de Permisos</h3>
            </slot>
          </div>

          <div class="modal-body">
            <slot name="body">
              <h3>¿Estas seguro de elminar el elemento: {{ elemento.name }}?</h3>
            </slot>
          </div>

          <div class="modal-footer">
            <slot name="footer">
            <button class="btn btn-danger" @click="$emit('close')">Cancelar</button>
            <button class="btn btn-success" @click="eliminarElemento(elemento)">Continuar</button>
            </slot>
          </div>
        </div>
      </div>
    </div>
  </transition>
  `,
  methods:{
    eliminarElemento: function(elemento){
      axios.delete('/api/usuario/'+elemento.id,
      {headers: {'X-CSRF-TOKEN': token}})
      .then( (response) => {
        usuarioApp.showModalDelete = false;
        this.$emit('eliminarElemento');
        usuarioApp.getUsers();
      })
      .catch((error) => {
        console.log(error);
      });
    }
  }
});
