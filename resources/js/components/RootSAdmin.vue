<template>
   <router-view></router-view> 
</template>
<script>
export default {
   data: () => ({
      Role: [],
    }),

    methods:{
        isPrivileges(){
            this.Role = localStorage.getItem('Role');
            //Role IDnya ikutin Sesuai DB
            if(this.Role == 1){
               this.$router.replace({path: "/superadmin"}); //untuk super admin
            }
            if(this.Role == 2){
               this.$router.replace({path: "/admin"});
            }
            
            else{
               this.$router.replace({path: "/customer"}); //untuk user
            }
        }
    },
    mounted(){
        this.isPrivileges();
    }
    
}
</script>