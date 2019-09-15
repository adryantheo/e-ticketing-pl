<template>
   <v-card>
       <v-text-field
       labe="Nama"
       v-model="name"
       ></v-text-field>
       <v-text-field
       label="E-mail"
       v-model="email"
       ></v-text-field>
       <v-text-field
       label="NO yang bisa dihubungi"
       v-model="phone"
       ></v-text-field>
       <v-layout>
          <v-flex>
             <v-btn>
                Cancel
             </v-btn>
          </v-flex>
          <v-flex>
             <v-btn type="submit">
                Booking
             </v-btn>
          </v-flex>
       </v-layout>
   </v-card>
</template>
<script>
export default {
   data: () => ({
      name: null,
      email:null,
      phone:null,
      is_vip:null,
   }),
   methods: {
      async OrderTIcket(){
         
      }
   },
}
</script>