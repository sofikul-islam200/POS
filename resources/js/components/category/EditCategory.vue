<template>
    <div>
        <div>
            <nav class="breadcrumb sl-breadcrumb">
                <router-link
                    class="btn btn-outline-primary"
                    to="/AllCategory"
                    style="color:black"
                    >All Category</router-link
                >
            </nav>
            <div class="container">
                <div
                    class="card pd-20 pd-sm-40 mt-4"
                    id="cards"
                    style="box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);border-radius: 0px;"
                >
                    <h6 class="card-body-title">Update Category</h6>
                    <br />
                    <div class="form-layout">
                        <form method="post" @submit.prevent="updateCategory">
                            <div class="row mg-b-25">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label"
                                            >Inter New Category Name :
                                            <span class="tx-danger"
                                                >*</span
                                            ></label
                                        >
                                        <input
                                            class="form-control"
                                            type="text"
                                            name="name"
                                            v-model="form.name"
                                            placeholder="Enter Category Name"
                                        />
                                        <small
                                            class="text-danger"
                                            v-if="this.errors.name"
                                            >{{ this.errors.name[0] }}
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <label class="form-control-label"
                                        >Category Description :
                                        <span class="tx-danger">*</span></label
                                    >
                                    <textarea
                                        v-model="form.description"
                                        cols="10"
                                        rows="5"
                                        class="form-control"
                                        style="border-radius:0px"
                                        placeholder="Category Short Description........."
                                    ></textarea>
                                    <small
                                        class="text-danger"
                                        v-if="this.errors.description"
                                        >{{ this.errors.description[0] }}
                                    </small>
                                </div>
                            </div>
                            <!-- row -->

                            <div class="form-layout-footer">
                                <button
                                    type="submit"
                                    class="btn btn-info mg-r-5"
                                >
                                    Update Now
                                </button>
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
       var id  = this.$route.params.id;
       this.EditCategory(id);
    },
    data() {
        return {
            form: {
                name:"",
                description:""
            },
            errors: {},
        };
    },
    methods: {
         EditCategory(id){
             axios.get('/api/CategoryEditForGet/'+id)
               .then(({data})=>(this.form= data))
               .catch()
         },
         updateCategory(){
            var id = this.$route.params.id;
            axios.post('/api/updateCategory/'+id,this.form)
              .then(() =>{
                   iziToast.success({
                        title: 'success',
                        message: 'Category Updated SuccessFully Done',
                        position:'topRight',
                        timeout:2000,
                    });
                  this.$router.push({name:'AllCategory'}) 
              })
              .catch()
         }
    }
};
</script>
