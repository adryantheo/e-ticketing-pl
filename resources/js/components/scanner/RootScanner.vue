<template>
<v-app align="center" justify="center">
    <router-view></router-view>
</v-app>
   
</template>
<script>
export default {
    data: () => ({
      Role: undefined,
    }),

    methods:{
        isPrivileges(){
            this.Role = localStorage.getItem('Role');
            //Role IDnya ikutin Sesuai DB
            if(this.Role == 1){
               this.$router.replace({path: "/scanner"}); //untuk super admin
            }
            else if(this.Role == 3){
               this.$router.replace({path: "/scanner"}); //untuk admin
            }
            else{
               this.$router.replace({path: "/"}); //untuk user
            }
        }
    },
    mounted(){
        this.isPrivileges();
    }
    
   
}
</script>