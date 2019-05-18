<template>

    <tr>

      <td>{{order.id}}</td>

      <td><img :src="order.img" height="25" width="25"></td>

      <td>{{order.quantity}}</td>

      <td>{{order.amount}}</td>

      <td>{{order.order_date}}</td>
      <td>

        <div class="box-tools pull-right">

    			<a :href="'/backend/order/'+order.id">
    				<i class="fa fa-eye"></i>
    			</a>

          <a :href="'#deleteOrder' + order.id" class="btn btn-box-tool" data-toggle="modal"><i class="fa fa-times"></i>
          </a>

        </div>

   	  </td>

      <div class="modal fade" :id="'deleteOrder' + order.id" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">

        <div class="modal-dialog" role="document">

          <div class="modal-content">

            <div class="modal-header">

              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

              <h4 class="modal-title" id="deleteModalLabel">Eliminar orden</h4>

            </div>

            <div class="modal-body">

              <h3>¿Seguro desea eliminar la orden?. No podrá recuperarla.</h3>

              <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>

                <button type="button" class="btn btn-danger" @click="deleteOrder()">Eliminar</button>

              </div>

            </div>

          </div>

        </div>

      </div>

  </tr>
  

</template>
<script>
    export default {
      props: ['order'],
        data(){
            return {
                errors: {},
                messages: {}
            } 
        },

        mounted(){

        	// axios
        	// 	.get(`/order-product/${this.order.product_id}`)
        	// 	.then(res => {
        	// 		this.product = res.data;

        	// 		console.log(res.data);
        	// 	})
        	// 	.catch(err => this.errors = res.data.data) 

        },

        methods: {
          deleteOrder(){

            axios
                .get(`/backend/order/delete/${this.order.id}`)
                .then(res => {
                  this.messages = 'Orden eliminada';

                }) 
                .catch(error => this.errors = error.response.data.errors);
                 window.location.reload();

          }
        }
    };
</script>