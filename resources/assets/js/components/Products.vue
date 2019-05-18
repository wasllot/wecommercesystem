<template>
  <div>
      <a class="btn btn-primary" href="/backend/product/addProduct">Añadir producto</a>

      <button class="btn btn-primary" data-toggle="modal" data-target="#editprice-modal">Modificar precios</button>

      <div class="box-body">

          <table id="example1" class="table table-bordered table-striped">

            <thead>

            <tr>

              <th>ID</th>

              <th>Slug</th>

              <th>Categoría</th>

              <th>Imagen</th>

              <th>Stock</th>

              <th>Precio</th>

              <th>Acción</th>

            </tr>

            </thead>

            <tbody>

               <product  v-for="(product, index) in products" :key="index" :product=product></product>
            
            </tbody>

          </table>

      </div>


      <div class="modal fade" id="editprice-modal">
       
          <div class="modal-dialog">

            <div class="modal-content">

              <form @submit.prevent="update">

                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                  <button type="button" class="close" data-dismiss="modal">&times;</button>

                  <h4 class="modal-title">Modificar precios</h4>

                </div>

                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->

                <div class="modal-body">

                  <div class="box-body">


                    <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->

                    <div class="form-group">
                      
                      <div class="input-group">
                      
                        <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                        <select class="form-control input-lg" v-model="parent_id" required>
                          
                          <option value="">Selecionar categoría</option>

                          <option v-for="(category, index) in categories" :key=index  :value="category.cat_id" v-if="!category.parent_id">{{category.cat}}</option>


                        </select>

                      </div>

                    </div>                

                    <!-- ENTRADA PARA SELECCIONAR SUBCATEGORÍA -->

                    <div class="form-group" v-if="parent_id">
                      
                      <div class="input-group">
                      
                        <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                        <select class="form-control input-lg" v-model="cat_id" required>
                          
                          <option value="">Selecionar subcategoría</option>
                          <option v-for="(category, index) in categories" :value="category.cat_id" v-if="category.parent_id==parent_id">{{category.cat}}</option>

                        </select>

                      </div>

                    </div>

          

                     <!-- ENTRADA PARA PRECIO COMPRA -->

                     <div class="form-group">


                          <!-- ENTRADA PARA PORCENTAJE -->
                            
                            <div class="input-group">

                              <label for="">Porcentaje de aumento</label>
                              
                              <input type="number" v-model="percent" class="form-control input-lg nuevoPorcentaje" min="0" required>

                              <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                            </div>

                          </div>

                  </div>


                </div>

                <!--=====================================
                PIE DEL MODAL
                ======================================-->

                <div class="modal-footer">

                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                  <input type="submit" class="btn btn-primary" value="Actualizar">

                </div>

              </form>
                  <!-- /.modal-dialog -->
            </div>

          </div>

       </div>

  </div>
</template>

<script>

import product from './Product'

    export default {
      components: {product},
      props: ['products', 'categories'],
      data(){
        return {
          errors: {},
          message:{},
          parent_id: null,
          cat_id: null,
          percent: null
        }

      },
      mounted(){
      
      },
      methods: {
        update(){
          axios
              .put(`/backend/product/${this.cat_id}/${this.percent}`)
              .then(res => {
                this.message = 'Precio de los productos actualizados';

                window.location.reload(); 

              })
              .catch(error => this.errors = error.response.data.errors);


        }
      }
    };

</script>