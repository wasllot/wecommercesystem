<template>

    <tr>

      <td>{{product.id}}</td>
      <td>{{product.slug}}</td>
      <td>{{product.category.cat}}</td>

      <td><img :src="product.a_img" height="25" width="25"></td>

      <td>{{product.quantity}}</td>

      <td>{{product.price}}</td>

      <td>

        <div class="box-tools pull-right">

        <a :href="'/backend/products/'+product.id">
        <i class="fa fa-eye"></i>
        </a>    	  
        <a :href="'/backend/products/edit/'+product.id">
    		<i class="fa fa-pencil"></i>
    	  </a>

          <a :href="'#deleteProduct' + product.id" class="btn btn-box-tool" data-toggle="modal"><i class="fa fa-times"></i>
          </a>

        </div>

   	  </td>

      <div class="modal fade" :id="'deleteProduct' + product.id" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">

        <div class="modal-dialog" role="document">

          <div class="modal-content">

            <div class="modal-header">

              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

              <h4 class="modal-title" id="deleteModalLabel">Eliminar producto</h4>

            </div>

            <div class="modal-body">

              <h3>¿Seguro desea eliminar el producto?. No podrá recuperarlo.</h3>

              <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>

                <button type="button" class="btn btn-danger" @click="deleteProduct()">Eliminar</button>

              </div>

            </div>

          </div>

        </div>

      </div>

	</tr>
  

</template>

<script>

    export default {

      props: ['product'],

        data(){

            return {
                errors: {},
                messages: {}
            } 
        },

        mounted(){

        },

        methods: {

          deleteProduct(){

            axios
                .get(`/backend/product/delete/${this.product.id}`)
                .then(res => {
                  this.messages = 'Orden eliminada';

                }) 
                .catch(error => this.errors = error.response.data.errors);
                 window.location.reload();

          },

        }
    };
</script>