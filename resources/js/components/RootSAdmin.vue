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
            else if(this.Role == 2){
               this.$router.replace({path: "/admin"});
            }
            else if(this.Role == 3){
               this.$router.replace({path: "/scanner"});
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