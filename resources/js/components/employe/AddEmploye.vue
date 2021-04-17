<template>
   <div>
     <nav class="breadcrumb sl-breadcrumb">
       <router-link class="btn btn-outline-primary" to="/AllEmploye" style="color:black">All Employee</router-link>
      </nav>
    <div class="container">
        <div class="card pd-20 pd-sm-40 mt-4" id="cards" style="box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);border-radius: 0px;">
            <h6 class="card-body-title">Add New Employee</h6><br/>
            <div class="form-layout">
                <form method="post" @submit.prevent="Store_Employee">
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
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label"
                                >Inter Email:
                                <span class="tx-danger">*</span></label
                            >
                           <input
                                class="form-control"
                                type="email"
                                name="email"
                                v-model="form.email"
                                placeholder="Enter Email"
                            />
                        <small class="text-danger" v-if="this.errors.email">{{this.errors.email[0]}}</small>
                        </div>
                    </div>
                    <!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label"
                                >Inter Phone:
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
                    <!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label"
                                >Inter Address:
                                <span class="tx-danger">*</span></label
                            >
                            <input
                                class="form-control"
                                type="text"
                                name="address"
                                v-model="form.address"    
                                placeholder="Enter Address"
                            />
                        <small class="text-danger" v-if="this.errors.address">{{this.errors.address[0]}}</small>
                        </div>
                    </div>
                    <!-- col-8 -->
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label"
                                >Inter Nid Number:
                                <span class="tx-danger">*</span></label
                            >
                            <input
                                class="form-control"
                                type="text"
                                name="address"
                                v-model="form.nid_number"    
                                placeholder="Enter Nid Number"
                            />
                            <small class="text-danger" v-if="this.errors.nid_number">{{this.errors.nid_number[0]}}</small>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label"
                                >Inter Sallary:
                                <span class="tx-danger">*</span></label
                            >
                            <input
                                class="form-control"
                                type="text"
                                name="sallary"
                                v-model="form.sallary"    
                                placeholder="Enter Sallary"
                            />
                        <small class="text-danger" v-if="this.errors.sallary">{{this.errors.sallary[0]}}</small>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label"
                                >Inter Joining Date:
                                <span class="tx-danger">*</span></label
                            >
                            <input
                                class="form-control"
                                type="date"
                                name="j_date"
                                v-model="form.j_date"    
                            />
                        <small class="text-danger" v-if="this.errors.j_date">{{this.errors.j_date[0]}}</small>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label"
                                >Inter Photo:
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
                           <img :src="form.photo" alt="Employe Image" style="width:100px;height:100px;">
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
    created() {
        if (!User.logIn()) {
            this.$router.push({ name: "/" });
        }
    },
    data() {
        return {
            form:{
                name:'',
                phone:'',
                photo:'',
                email:'',
                nid_number:'',
                address:'',
                j_date:'',
                sallary:''
            },
            errors:{}
        };
    },
    methods: {
        //working with image
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
                    this.form.photo = event.target.result;
               }
               Reader.readAsDataURL(file);
           }
        },

        //add new employee 
        Store_Employee(){
           axios.post('/api/AddEmploye/',this.form)
               .then(res =>{
               this.$router.push({name:'AllEmploye'})    
               iziToast.success({
                   title: 'success',
                   message: 'Employe Insert Successfully Done',
                   position:'topRight',
                   timeout:2000,
                });
               })
               .catch(error =>{
                   this.errors = error.response.data.errors;
               })
        }
    }
};
</script>
