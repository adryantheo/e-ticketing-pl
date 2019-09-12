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
                     <v-form ref="form_login" @sumbit.prevent="login">
                        <v-card-text>
                           <v-text-field
                           label="email"
                           :rules="[rules.required]"
                           ></v-text-field>
                           <v-text-field
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
                           flat type="submit"
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
   
}
</script>

