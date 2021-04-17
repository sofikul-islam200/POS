<template>
   <div>
     <nav class="breadcrumb sl-breadcrumb">
       <router-link class="btn btn-outline-primary" to="/AllProduct" style="color:black">All Product</router-link>
      </nav>
    <div class="container">
        <div class="card pd-20 pd-sm-40 mt-4" id="cards" style="box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);border-radius: 0px;">
            <h6 class="card-body-title">Add New Product</h6><br/>
            <div class="form-layout">
                <form method="post" @submit.prevent="AddProduct">
                    <div class="row mg-b-25">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label"
                                >Product Name:
                                <span class="tx-danger">*</span></label
                            >
                            <input
                                class="form-control"
                                type="text"
                                name="product_name"
                                v-model="form.product_name"
                                placeholder="Product Name"
                            />
                          <small class="text-danger" v-if="this.errors.product_name">{{this.errors.product_name[0]}}</small> 
                        </div>
                    </div>
                    <!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label"
                            for="product_code"
                                >Product Code :
                                <span class="tx-danger">*</span></label
                            >
                           <input
                                class="form-control"
                                type="text"
                                name="product_code"
                                id="product_code"
                                v-model="form.product_code"
                                placeholder="product code"
                            />
                        <small class="text-danger" v-if="this.errors.product_code">{{this.errors.product_code[0]}}</small> 
                        </div>
                    </div>
                    <!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label"
                            for="category_id"
                                >Category:
                                <span class="tx-danger">*</span></label
                            >
                        <select v-model="form.category_id" id="category_id" class="form-control" name="category_id">
                           <option value="">Select Category</option>
                           <option v-for="categories in AllCategories" :key="categories.id" :value="categories.id">{{categories.name}}</option>
                        </select>
                           
                        <small class="text-danger" v-if="this.errors.category_id">{{this.errors.category_id[0]}}</small>          
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label"
                            for="supplier_id"
                                >Supplier:
                                <span class="tx-danger">*</span></label
                            >
                        <select v-model="form.supplier_id" id="supplier_id" class="form-control" name="supplier_id">
                                <option value="">Select Supplier </option>

                                <option v-for="supplier in AllSupplier" :key="supplier.id" :value="supplier.id">{{supplier.shop_name}}</option>
                        </select>  
                        <small class="text-danger" v-if="this.errors.supplier_id">{{this.errors.supplier_id[0]}}</small>         
                        </div>
                    </div>

                     <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label"
                            for="root"
                                >Root :
                                <span class="tx-danger">*</span></label
                            >
                           <input
                                class="form-control"
                                type="text"
                                name="root"
                                id="root"
                                v-model="form.root"
                                placeholder="Root"
                            />
                        <small class="text-danger" v-if="this.errors.root">{{this.errors.root[0]}}</small> 
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label"
                            for="buying_price"
                                >Buying Price :
                                <span class="tx-danger">*</span></label
                            >
                           <input
                                class="form-control"
                                type="text"
                                name="buying_price"
                                v-model="form.buying_price"
                                placeholder="buying price"
                            />
                        <small class="text-danger" v-if="this.errors.buying_price">{{this.errors.buying_price[0]}}</small> 
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label"
                            for="selling_price"
                                >Selling Price :
                                <span class="tx-danger">*</span></label
                            >
                           <input
                                class="form-control"
                                type="text"
                                id="selling_price"
                                name="selling_price"
                                v-model="form.selling_price"
                                placeholder="Selling price"
                            />
                        <small class="text-danger" v-if="this.errors.selling_price">{{this.errors.selling_price[0]}}</small> 
                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label"
                            for="buying_date"
                                >Buying Date :
                                <span class="tx-danger">*</span></label
                            >
                           <input
                                class="form-control"
                                type="date"
                                name="buying_date"
                                v-model="form.buying_date"
                                
                            />
                        <small class="text-danger" v-if="this.errors.buying_date">{{this.errors.buying_date[0]}}</small> 
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label"
                            for="product_quantity"
                                >Product Quantity :
                                <span class="tx-danger">*</span></label
                            >
                           <input
                                class="form-control"
                                type="text"
                                name="product_quantity"
                                v-model="form.product_quantity"
                                placeholder="product quantity"
                                
                            />
                        <small class="text-danger" v-if="this.errors.product_quantity">{{this.errors.product_quantity[0]}}</small> 
                        </div>
                    </div>
                  
                    <!-- col-4 -->
                    <div class="col-lg-6">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label"
                                >Product Photo:
                                <span class="tx-danger">*</span></label
                            >
                            <input
                                class="form-control"
                                type="file"
                                name="image"
                                @change="Image"   
                            />
                            <small class="text-danger" v-if="this.errors.image">{{this.errors.image[0]}}</small> 
                        </div>
                    </div>

                     <div class="col-lg-6">
                        <div class="form-group mg-b-10-force">
                           <img :src="form.image" alt="Product Image" style="width:100px;height:100px;">
                        </div>
                    </div>
                    <!-- col-4 -->
                </div>
                <!-- row -->


                <div class="form-layout-footer">
                    <button type="submit" class="btn btn-info mg-r-5"> Add Now </button>
                    <button type="reset" class="btn btn-secondary">Cancel</button>
                </div>
               </form>
                <!-- form-layout-footer -->
            </div>
            <!-- form-layout -->
        </div>
        <!-- card -->
    </div>
    </div>
</template>
<script>
export default {
   data(){
     return {
        form:{
          product_name:'',
          product_code:'',
          image:'',
          category_id:'',
          supplier_id:'',
          root:'',
          buying_price:'',
          selling_price:'',
          buying_date:'',
          product_quantity:'',
        },
        AllCategories:[],
        AllSupplier:[],
        errors:[],

     }
   },
   created(){
    if(!User.logIn()){
       this.$router.push({name:'/'});
    }
    //for category 
       axios.get('/api/showCategory/')
           .then((res)=>{
               this.AllCategories = res.data;
           })
           .catch()

    
    //for supplier===============
    axios.get('/api/showSupplier/')
         .then((res) =>{
            this.AllSupplier = res.data;
         })
         .catch()  

  },
   methods:{
      Image(event){
         let file = event.target.files[0];
         if(file.size > 1048770){
            iziToast.error({
                title: 'Error',
                message: 'image size less than 1 MB',
                position:'topRight',
                timeout:2000,
            });
         }else{
             let Reader = new FileReader();
             Reader.onload = event =>{
                 this.form.image = event.target.result;
             }
             Reader.readAsDataURL(file);

         }
      },
      AddProduct(){
        axios.post('/api/AddProduct/',this.form)
           .then((res)=>{
             this.$router.push({name:'AllProduct'});  
            iziToast.success({
                title: 'success',
                message: 'product add successfully done',
                position:'topRight',
                timeout:2000,
            });
           })
           .catch((error) =>{
              this.errors = error.response.data.errors;
           })
      }
   }
}
</script>