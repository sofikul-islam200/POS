<template>
       <div>
         <div>
     <nav class="breadcrumb sl-breadcrumb">
       <router-link class="btn btn-outline-primary" to="/AllSupplier" style="color:black">All Supplier</router-link>
      </nav>
    <div class="container">
        <div class="card pd-20 pd-sm-40 mt-4" id="cards" style="box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);border-radius: 0px;">
            <h6 class="card-body-title">Add New Supplier</h6><br/>
            <div class="form-layout">
                <form method="post" @submit.prevent="addSupplier">
                    <div class="row mg-b-25">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label"
                                >Inter Name:
                                <span class="tx-danger">*</span></label
                            >
                            <input
                                class="form-control"
                                type="text"
                                name="name"
                                v-model="form.name"
                                placeholder="Enter Name"
                            />
                            <small class="text-danger" v-if="this.errors.name">{{this.errors.name[0]}}</small>
                        </div>
                    </div>
                    <!-- col-4 -->
                    <!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label"
                                >Inter Email:
                                <span class="tx-danger">*</span></label
                            >
                            <input
                                class="form-control"
                                type="text"
                                name="email"
                                v-model="form.email"
                                placeholder="Enter Phone"
                            />
                             <small class="text-danger" v-if="this.errors.email">{{this.errors.email[0]}}</small>
                        </div>
                    </div>
                    <!-- col-8 -->
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label"
                                >Phone Number :
                                <span class="tx-danger">*</span></label
                            >
                            <input
                                class="form-control"
                                type="number"
                                name="phone"
                                v-model="form.phone"
                                placeholder="Enter Phone"
                            />
                             <small class="text-danger" v-if="this.errors.phone">{{this.errors.phone[0]}}</small>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label"
                                > Address:
                                <span class="tx-danger">*</span></label
                            >
                            <input
                                class="form-control"
                                type="text"
                                name="address"  
                                v-model="form.address"
                                placeholder="Enter current_address"
                            />
                             <small class="text-danger" v-if="this.errors.address">{{this.errors.address[0]}}</small>
                        </div>
                    </div>
                     <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label"
                                >Inter Shop Name:
                                <span class="tx-danger">*</span></label
                            >
                           <input
                                class="form-control"
                                type="shop_name"
                                name="shop_name"
                                v-model="form.shop_name"
                                placeholder="Enter shop name"
                            />
                             <small class="text-danger" v-if="this.errors.shop_name">{{this.errors.shop_name[0]}}</small>
                        </div>
                    </div>


                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label"
                                > Photo:
                                <span class="tx-danger">*</span></label
                            >
                            <input
                                class="form-control"
                                type="file"
                                name="photo"
                                @change="Image"   
                            />
                        </div>
                    </div>

                     <div class="col-lg-6">
                        <div class="form-group mg-b-10-force">
                           <img :src="form.shop_photo" alt="Customer Image" style="width:100px;height:100px;">
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
    </div>
</template>
<script>
export default {
    created(){
        if(!User.logIn()){
            this.$router.push({name:'/'});
        }
    },
     data(){
         return{
             form:{
                 name:'',
                 email:'',
                 phone:'',
                 address:'',
                 shop_name:'',
                 shop_photo:'',
             },
             errors:{}
         }
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
                     this.form.shop_photo = event.target.result;
                }
                Reader.readAsDataURL(file);
            }
         },
         addSupplier(){
             axios.post("/api/AddSupplier/",this.form)
                .then(()=>{
                iziToast.success({
                title: 'success',
                message: 'supplier insert successfully done',
                position:'topRight',
                timeout:2000,
              });
                this.$router.push({name:'AllSupplier'})
                })
                .catch(error =>{
                   this.errors = error.response.data.errors;
                })
         }
     }

}
</script>