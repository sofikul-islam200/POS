<template>
    <div>
    </div>
</template>
<script>
export default {
    created(){
       localStorage.removeItem('token');
       localStorage.removeItem('user')
       Toast.fire({
        icon: "success",
        type: "success",
        title: "SignOut  successfully"
       });
    this.$router.push({ name: "/" });
    }
}
</script>
