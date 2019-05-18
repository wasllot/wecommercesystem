<template>

    <div class="box-body">

      <form @submit.prevent="create" >
          <!-- Nombre  -->
          <div class="form-group">

            <label>Nombre</label>

            <input v-model="form.name" type="text" class="form-control" placeholder="Nombre" required>

            <br>  

          </div>                

          <!-- Slug  -->
          <div class="form-group">

            <label>Slug (Nombre corto)</label>

            <input v-model="form.slug" type="text" class="form-control" placeholder="Nombre" required>
            <br>

          </div>
                  <!-- select -->
          <div class="form-group">
              <label>Seleccione una categoría</label>

              <select class="form-control" v-model="parent_id" required>
                <option selected disabled hidden>Categoría</option>

                <option v-for="(category, index) in categories" :value="category.cat_id" v-if="!category.parent_id">{{category.cat}}</option>

              </select>
            <br>          
          </div>                 

          <div v-if="parent_id" class="form-group">
              <label>Seleccione una subcategoría</label>

              <select class="form-control" v-model="form.cat_id" required>
                <option selected disabled hidden>Sub categoría</option>

                <option v-for="(category, index) in categories" :value="category.cat_id" v-if="category.parent_id==parent_id">{{category.cat}}</option>

              </select>
            <br>          
          </div>                

          <!-- select -->
          <div class="form-group">
                    <label>Seleccione una marca</label>

                    <select class="form-control" v-model="form.brand_id" required>
                      <option selected disabled hidden>Marca</option>

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
  <!--             <div class="col-md-12">
                <label for="img-2">Imagen 2  </label>
                <input @change="img_b" id="img-2" type="file" style="">
                <br><br>

              </div>
              <div class="col-md-12">
                <label for="img-3">Imagen 3  </label>
                <input @change="img_c" id="img-3" type="file" style="">

                
              </div> -->
            </div>

          </div>
          <br><br>        
          <hr>

          <div class="form-group">

                <label for="">Precio  </label>
                <input v-model="form.price" class="form-control" type="number" required>

          </div>

          <div class="form-group">
            <label for="">Stock  </label>
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
      props: ['categories', 'brands'],
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
                  quantity: null,
                  price: null
                },
                image: null,
                files:{
                  file1: '',
                  file2:'',
                  file3: ''
                },
                parent_id:null    
             
            } 
        },

        mounted(){

          console.log('Categorias: '+this.categories[0]);
          console.log('Marcas: '+this.brands);

        },

        methods: {
            onImageChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
            },
            createImage(file) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {

                    vm.form.a_img.a_img = e.target.result;
                };
                reader.readAsDataURL(file);
            },

           img_a(e){

            // this.files.file1 =  e.target.files[0];

          },

          uploadFile(e){

            this.image = 'https://thumbs.gfycat.com/ObviousQuarrelsomeIntermediateegret-max-1mb.gif'; 

            this.files.file1 =  e.target.files[0];

            firebase.storage().ref('products/'+this.files.file1.name).put(this.files.file1)
              .then(response => {
                response.ref.getDownloadURL().then((downloadUrl) => {

                    this.form.a_img.push(downloadUrl);

                    this.image = downloadUrl; 
                    
                  })                 
             .catch(err => console.log(err))
            })

          },
        

          img_b(e){

            // this.form.img.img_b =  e.target.files[0];

          },          
          img_c(e){

            // this.form.img.img_c =  e.target.files[0];

          },

          create(){

            this.form.description = CKEDITOR.instances['editor1'].getData();

            // if(this.files.file1 !=null){

            //   this.uploadFile(); 

            // }

            axios
                .post(`/backend/product/create`, this.form)
                .then(res => {
                  this.messages = 'Pregunta enviada';
                  console.log(res);

                  window.location.reload(); 
                })
                .catch(error=> this.errors = error.response.data.errors);

          }


        }
    };
</script>