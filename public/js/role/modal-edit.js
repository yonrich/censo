Vue.component('modal-edit', {
  props: ['elemento','url'],
  template: `
  <transition name="modal">
    <div class="modal-mask">
      <div class="modal-wrapper">
        <div class="modal-container">
          <span class="btn btn-danger fa fa-times pull-right" @click="$emit('close')"></span>
          <div class="modal-header">
            <slot name="header">
              <h3 class="page-header">Edición de Roles</h3>
            </slot>
          </div>

          <div class="modal-body">
            <slot name="body">
              <form v-on:submit.prevent="guardarElemento">
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
                  <label for="level">Nivel: </label>
                  <select v-model="elemento.level">
                    <option value="0">Selecciona un Nivel</option>
                    <option value="1">Nivel 1</option>
                    <option value="2">Nivel 2</option>
                    <option value="3">Nivel 3</option>
                  </select>
                </div>
                <input type="submit" class="btn btn-success btn-lg fa fa-save" value="Guardar"/>
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
      axios.put(this.url+"/"+this.elemento.id, {
        name: this.elemento.name,
        slug: this.elemento.slug,
        description: this.elemento.description,
        level: this.elemento.level
      })
      .then( (response) => {
        console.log(response);
        this.$emit('guardarElemento');

        roleApp.showModalEdit = false;
        roleApp.getRoles();
      })
      .catch((error) => {
        console.log(error);
      });

    }
  }
});
