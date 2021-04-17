<template>
      <div>
        <nav class="breadcrumb sl-breadcrumb">
            <router-link class="btn btn-outline-primary" to="/AddProduct" style="color:black">Add Product</router-link>
        </nav>
        <div class="container">
            <div
                class="card pd-20 pd-sm-40 mt-4"
                id="cards"
                style="box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);border-radius: 0px;"
            >
                <div class="row">
                    <div class="col-md-9">
                        <h6 class="card-body-title">All Product List</h6>
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
                                <th class="bg-info">
                                    <button type="button" class="btn btn-outline-danger" style="padding: 5px 8px;"><i class="fa fa-trash"></i></button>
                                </th>
                                <th>SL NO</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>root</th>
                                <th>Selling Price</th>
                                <th>Buying Price</th>
                                <th>Buying Date</th>
                                <th>Photo</th>
                                <th>Product Quant</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                               v-for="(product,index) in getProduct" :key="product.id"
                            >
                                <td>
                                   <input type="checkbox" name="delete" id="" class="form-control">
                                </td>
                                <td>{{index + 1}}</td>
                                <td>{{product.product_name}}</td>
                                <td>{{product.product_code}}</td>
                                <td>{{product.root}}</td>
                                <td>{{product.selling_price}}</td>
                                <td>{{product.buying_price}}</td>
                                <td>{{product.buying_date}}</td>
                                <td>
                                    <img
                                        :src="product.image"
                                        alt="no photo"
                                        style="width:70px;height:60px"
                                    />
                                </td>
                                <td>{{product.product_quantity}}</td>
                                <td id="action" style="width: 13%;">
                                    <router-link
                                        to=""
                                        class="btn btn-sm btn-outline-primary"
                                        id="action"
                                        style="border-radius:20px"
                                        title="edit"
                                        ><i class="fa fa-edit"></i
                                    ></router-link>
                                    <router-link
                                        to=""
                                        class="btn btn-sm btn-outline-info"
                                        id="action"
                                        style="border-radius:20px"
                                        title="view"
                                        ><i class="fa fa-eye"></i
                                    ></router-link>

                                    <a
                                       @click="DeleteProduct(product.id)" 
                                        class="btn btn-sm btn-outline-danger"
                                        id="action"
                                        style="border-radius:20px;color:red"
                                        title="delete"
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
export default {
   data(){
     return {
         getProduct:[],
     }
   },
   created(){
       if(!User.logIn()){
         this.$router.push({name:'/'})
       }

       axios.get('/api/getProduct/')
         .then((res) =>{
           this.getProduct = res.data;
           this.tabla();
         })
         .catch()
   },
   methods:{
     tabla() {
            this.$nextTick(() => {
                $("#datatable").DataTable();
            });
        },
       DeleteProduct(id){
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
                   
                 axios.get('/api/deleteproduct/'+id)
                     .then((res) =>{
                         this.getProduct = this.getProduct.filter(product =>{
                              return product.id !== id;
                         })
                         iziToast.success({
                        title: 'success',
                        message: 'product Deleted successfully done',
                        position:'topRight',
                        timeout:2000,
                        });
                     })
                     .catch()   
                       
                       
                }
            });
       }

   }
}
</script>