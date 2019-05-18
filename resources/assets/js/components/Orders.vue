<template>
 
     <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Imagen</th>
                  <th>Cantidad</th>
                  <th>Monto</th>
                  <th>Fecha</th>
                  <th>Acción</th>
                </tr>
                </thead>
                <tbody>

                   <order  v-for="(order, index) in orders" :key="index" :order=order></order>
                
                </tbody>
              </table>
    </div>

</template>
<script>
import order from './Order'

    export default {
      components: {order},
      props: ['orders'],
      data(){
        return {
          errors: {},
        }

      },
      mounted(){
      
      }
    };

</script>