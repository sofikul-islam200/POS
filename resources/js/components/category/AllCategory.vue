<template>
   <div>
        <nav class="breadcrumb sl-breadcrumb">
            <router-link class="btn btn-outline-primary" to="/AddCategory" style="color:black">Add Category</router-link>
        </nav>
        <div class="container">
            <div
                class="card pd-20 pd-sm-40 mt-4"
                id="cards"
                style="box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);border-radius: 0px;"
            >
                <div class="row">
                    <div class="col-md-9">
                        <h6 class="card-body-title">All Category List</h6>
                    </div>
                </div>
                <div class="table-responsive">
                    <table
                        id="datatable"
                        class="table"
                        style="box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);border-radius: 0px;"
                    >
                        <thead class="bg-info">
                            <tr>
                               
                                <th>SL NO</th>
                                <th>CATEGORY NAME</th>
                                <th>DESCRIPTION</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(category,index) in AllCategory" :key="category.id">
                               
                                <td>{{index + 1 }}</td>
                                <td>{{category.name}}</td>
                                <td>{{category.description}}</td>
                                <td id="action" style="width: 13%;">
                                    <router-link :to="{name:'EditCategory',params:{id:category.id}}"
                                       
                                        class="btn btn-sm btn-outline-primary"
                                        id="action"
                                        style="border-radius:20px"
                                        title="edit"
                                        ><i class="fa fa-edit"></i
                                    ></router-link>
                                    <a
                                        class="btn btn-sm btn-outline-danger"
                                        id="action"
                                        style="border-radius:20px;color:red"
                                        title="delete"
                                        @click="deleteCategory(category.id)"
                                        ><i class="fa fa-trash"></i
                                    ></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- card -->
        </div>
    </div>
</template>
<script>
import datatable from "datatables.net-bs4";
export default {
    created(){
       if(!User.logIn()){
           this.$router.push({name:'/'})
       }
       this.GetCategory();
    },
    data(){
        return{
              AllCategory:[],
        }
         
    },
    methods:{
         tabla() {
            this.$nextTick(() => {
                $("#datatable").DataTable();
            });
        },
        
        GetCategory(){
            axios.get('/api/getallcategory/')
              .then(res =>{
                  this.AllCategory = res.data;
                  this.tabla();
              })
              .catch(error =>{
                  console.log(error);
              })
        },

        deleteCategory(id){
           
               Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to delete this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then(result => {
                if (result.isConfirmed) {
                     axios.delete('/api/deleteSingleCategory/'+id)
                        .then( res =>{
                             this.AllCategory = this.AllCategory.filter(category=>{
                                   return category.id != id;
                             })
                            iziToast.success({
                                title: 'success',
                                message: 'Category Deleted SuccessFully Done',
                                position:'topRight',
                                timeout:2000,
                            }); 
                        })
                        .catch(error =>{
                            console.log(error);
                        })
                }else{
                iziToast.warning({
                title: 'warning',
                message: 'deleteing cancel ..',
                position:'topLeft',
                timeout:2000,
              });
                }
            });
        }
    }
}
</script>