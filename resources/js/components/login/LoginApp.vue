<template>
   <v-app>
      <v-content>
         <v-container grid-list-lg fill-height>
            <v-layout row wrap justify-center align-center>
               <v-flex xs12 md9 style="max-width: 600px">
                  <v-card elevation=10>
                     <v-toolbar>
                        <v-toolbar-title>
                           <h2>LOGIN</h2>
                        </v-toolbar-title>
                     </v-toolbar>
                     <v-form ref="login_form">
                        <v-card-text>
                           <v-text-field
                           v-model="email"
                           label="email"
                           :rules="[rules.required]"
                           ></v-text-field>
                           <v-text-field
                           v-model="password"
                           label="Password"
                           type="password"
                           :rules="[rules.required]"
                           ></v-text-field>
                           </v-card-text>
                           <v-card-actions>
                              <router-link :to="{path: '/register'}">Buat Akun</router-link>
                              <v-spacer></v-spacer>
                              <v-btn 
                           color="success"
                           outline round 
                           flat
                           :loading="loading"
                           @click="login"
                           >login
                           </v-btn>
                           </v-card-actions>
                  </v-form>
                  </v-card>
               </v-flex>
            </v-layout>
         </v-container>
      </v-content>
   </v-app>
</template>
<script>
export default {
   data: () => ({
      drawer: null,
      loading: false,
      email: undefined,
      password: undefined,
      Role: undefined,

      rules: {
        email: v => (v || '').match(/@/) || 'Format Email Salah',
        length: len => v => (v || '').length >= len || `Invalid character length, required ${len}`,
        password: v => (v || '').match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/) || 'Password harus terdiri dari alphabert, angka, huruf kapital, dan karakter spesial',
        required: v => !!v || 'Tidak Boleh Kosong',     
      },
      
}),

   methods: {
      async login(){
        if(this.$refs.login_form.validate()){
          this.loading = true
          try{
            const request = {
              email: this.email,
              password: this.password
            }
            const res = await this.$user.login(request);
            await this.$user.storeSession(res.data);
            this.Role = localStorage.getItem('Role');
            //Role IDnya ikutin Sesuai DB
            if(this.Role == 1){
               this.$router.replace({path: "/superadmin"}); //untuk super admin
            }
            else if(this.Role == 3){
               this.$router.replace({path: "/admin"}); //untuk admin
            }
            else{
               this.$router.replace({path: "/"}); //untuk user
            }
            
            // 
          }catch(error){
            alert(error);
          }
          this.loading = false
        }
      },
   }

}
</script>
