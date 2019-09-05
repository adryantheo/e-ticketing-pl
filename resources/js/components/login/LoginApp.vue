<template>
   <v-app>
      <v-content>
         <v-container grid-list-lg fill-height>
            <v-layout row wrap justify-center align-center>
               <v-flex xs12 md9 style="max-width: 600px">
                  <v-card elevation=10>
                     <v-form ref="form_login" @sumbit.prevent="login">
                        <v-card-text>
                           <v-text-field
                           label="email"
                           v-model="email"
                           ></v-text-field>
                           <v-text-field
                           label="Password"
                           type="password"
                           ></v-text-field>
                           </v-card-text>
                           <v-flex class="text-xs-center">
                              <v-btn
                              color="primary"
                              type="submit"
                              outline round larg
                              >
                              login
                              </v-btn>
                              </v-flex>
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
      email:null,
      password:null,
      loading:false
   }),
   methods: {
      async login(){
         if(this.$refs.form_login.validate()){
            this.loading = true;
            try{
               
            }catch(err){
               swal(
                  "E-Mail atau Password salah",
                  "",
                  "error"
               )
               console.log(err)
            }
         }
      }
   },
}
</script>