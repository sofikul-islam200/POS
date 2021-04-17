<template>
    <div class="container">
        <img src="../../../../public/backend/employee_images/404.jpg" alt="" id="404s" style="width: 100%;
    margin-top: 24px;">
    </div>
</template>
<script>
export default {
    created(){
        if(!User.logIn()){
            this.$router.push({name:'/'});
        }
    }
}
</script>