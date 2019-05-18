<template>

    <div class="box-body">

      <form @submit.prevent="update" >
          <!-- Nombre  -->
          <div class="form-group">

            <label>Nombre: </label>

            <input v-model="form.name" type="text" class="form-control" required>

            <br>  

          </div>                

          <!-- Slug  -->
          <div class="form-group">

            <label>Slug: </label>

            <input v-model="form.slug" type="text" class="form-control" required>
            <br>

          </div>
                  <!-- select -->
          <div class="form-group">

              <label>Categoría: </label>

              <select class="form-control" v-model="parent_id" required>

                <!-- <option selected :value="product.category.parent_id">Categoría</option> -->

                <option v-for="(category, index) in categories" :value="category.cat_id" v-if="!category.parent_id">{{category.cat}}</option>

              </select>
            <br>          
          </div>                 

          <div v-if="parent_id" class="form-group">

              <label>Subcategoría: {{product[0].category.cat}}</label>

              <select class="form-control" v-model="form.cat_id" required>
                <!-- <option selected :value="product.category.cat_id">{{product.category.cat}}</option> -->

                <option v-for="(category, index) in categories" :value="category.cat_id" v-if="category.parent_id==parent_id">{{category.cat}}</option>

              </select>
            <br>          
          </div>                

          <!-- select -->
          <div class="form-group">
	
            <label>Marca: {{product[0].brands.brand}}</label>

            <select class="form-control" v-model="form.brand_id" required>
              <!-- <option selected :value="product.brand.brand_id">{{product.brand.brand}}</option> -->

              <option v-for="(brand, index) in brands" :value="brand.brand_id" >{{brand.brand}}</option>

            </select>
            <br>          
          </div>
          
          <div class="form-group">
                    
            <label>Descripcion del producto</label>

                <textarea v-model="form.description" id="editor1" name="editor1" rows="10" cols="80" required>
                </textarea>

                <br>          

          </div>

          <div class="form-group">

            <label for="">Imágenes del producto</label>
            <br><br>

            <div class="row">

              <div class="col-md-12">

                <div class="row">

                  <div class="col-md-6">

                    <label for="img-1">Imagen 1  </label>

                    <input v-on:change="uploadFile" id="img-1" type="file" style="">

                    <br><br>

                  </div>

                  <div class="col-md-6">
                    
                    <img :src="image" width="100" alt="">

                  </div>

                </div>

              </div>              

              <div class="col-md-12">

                <div class="row">

                  <div class="col-md-6">

                    <label for="img-2">Imagen 2 </label>

                    <input v-on:change="uploadFile2" id="img-2" type="file" style="">

                    <br><br>

                  </div>
                  <div class="col-md-6">
                    
                    <img :src="image2" width="100" alt="">

                  </div>

                </div>

              </div>             

              <div class="col-md-12">

                <div class="row">

                  <div class="col-md-6">

                    <label for="img-3">Imagen 3  </label>

                    <input v-on:change="uploadFile3" id="img-3" type="file" style="">

                    <br><br>

                  </div>

                  <div class="col-md-6">
                    
                    <img :src="image3" width="100" alt="">

                  </div>

                </div>

              </div>

            </div>

          </div>

          <br><br>        
          <hr>

          <div class="form-group">

            <label for="">Precio: </label>
            <input v-model="form.price" class="form-control" type="number" required>

          </div>

          <div class="form-group">
            <label for="">Stock: </label>
            <input v-model="form.quantity" class="form-control" type="number" required>

          </div>

          <br>
          <br>
          <br>
          
          <div style="display: flex; justify-content: center;">

            <input class="btn btn-success" type="submit" value="Guardar">
            
          </div>

        </form>

    </div>

</template>

<script>


import firebase from 'firebase/app';
import 'firebase/storage';

    export default {
      props: ['product', 'categories', 'brands'],
        data(){

            return {
                errors: {},
                messages: {},
                form: {
                  name: '',
                  cat_id: '',
                  brand_id: '',
                  slug: '',
                  description: '',
                  a_img: [],
                  b_img: [],
                  c_img: [],
                  quantity: null,
                  price: null
                },
                image: null,
                image2: null,
                image3: null,
                files:{
                  file1: '',
                  file2:'',
                  file3: ''
                },
                parent_id:null    
             
            } 
        },

        mounted(){

        	this.image = this.product[0].a_img; 
        	this.image2 = this.product[0].b_img;
        	this.image3 = this.product[0].c_img;	       	

   			this.form.name =  this.product[0].name;
   			this.form.cat_id = this.product[0].cat_id;
   			this.form.brand_id = this.product[0].brand_id;
   			this.form.slug = this.product[0].slug;
   			this.form.description = this.product[0].description;
   			this.form.a_img.push(this.product[0].a_img);
   			this.form.b_img.push(this.product[0].b_img);
   			this.form.c_img.push(this.product[0].c_img); 
   			this.form.quantity = this.product[0].quantity;
   			this.form.price = this.product[0].price;

   			this.parent_id = this.product[0].parent_id; 


        },

        methods: {

          uploadFile(e){

            this.image = 'https://thumbs.gfycat.com/ObviousQuarrelsomeIntermediateegret-max-1mb.gif'; 

            this.files.file1 =  e.target.files[0];

            firebase.storage().ref('products/'+this.files.file1.name).put(this.files.file1)
              .then(response => {
                response.ref.getDownloadURL().then((downloadUrl) => {

                    this.form.a_img[0] = downloadUrl;

                    this.image = downloadUrl; 
                    
                  })                 
             .catch(err => console.log(err))
            })

          },

          uploadFile2(e){
            this.image2 = 'https://thumbs.gfycat.com/ObviousQuarrelsomeIntermediateegret-max-1mb.gif'; 

            this.files.file2 =  e.target.files[0];

            firebase.storage().ref('products/'+this.files.file2.name).put(this.files.file2)
              .then(response => {
                response.ref.getDownloadURL().then((downloadUrl) => {

                    this.form.b_img[0] = downloadUrl;

                    this.image2 = downloadUrl; 
                    
                  })                 
             .catch(err => console.log(err))
            })

          },

          uploadFile3(e){
          	this.image3 = 'https://thumbs.gfycat.com/ObviousQuarrelsomeIntermediateegret-max-1mb.gif'; 

            this.files.file3 =  e.target.files[0];

            firebase.storage().ref('products/'+this.files.file3.name).put(this.files.file3)
              .then(response => {
                response.ref.getDownloadURL().then((downloadUrl) => {

                    this.form.c_img[0] = downloadUrl;

                    this.image3 = downloadUrl; 
                    
                  })                 
             .catch(err => console.log(err))
            })


          },
        
          update(){

            this.form.description = CKEDITOR.instances['editor1'].getData();

            axios
                .put(`/backend/product/update/${this.product[0].id}`, this.form)
                .then(res => {
                  this.messages = 'Producto actualizado';
                  

                  window.location.reload(); 
                })
                .catch(error=> this.errors = error.response.data.errors);

          }


        }
    };
</script>