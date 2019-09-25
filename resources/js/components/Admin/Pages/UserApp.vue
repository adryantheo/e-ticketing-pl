<template>
   <v-container grid-list-lg>
      <v-layout row wrap v-if="loading">
         <v-flex class="text-xs-center">
            <v-progress-circular
            :size="70"
            :width="7"
            indeterminate
            ></v-progress-circular>
         </v-flex>
      </v-layout>
      <template v-else>
         <v-layout>
            <v-flex>
               <h1>Daftar Pengguna</h1>
            </v-flex>
            <v-spacer></v-spacer>
            <v-btn>
               <v-icon>fa fa-plus</v-icon>
               Tambah User
            </v-btn>
         </v-layout>
         <v-data-table
         :headers="headers"
         :items="items"
         disable-initial-sort
         :loading="loading"
         rows-per-pages-text="Baris per halaman"
         >
            <template v-slot:items="props">
               <td> {{props.item.id}} </td>
               <td> {{props.item.name}} </td>
               <td> {{props.item.email}} </td>
               <td> {{props.item.role}} </td>
               <td>
                  <v-btn flat icon >
                  <v-icon color="error">fa fa-trash</v-icon>
                  </v-btn>
               </td>
            </template>
         </v-data-table>
      </template>
   </v-container>
   
</template>
<script>
export default {
   data: () => ({
      loading : false,
      items: [],
      headers: [
         {text: "ID", value: "id"},
         {text: "Nama", value: "name"},
         {text: "E-MAil", value: "email"},
         {text: "aksi", value: ""}
      ]
   }),
   methods: {
      fetchUser(){
         return axios.get('/api/user')
      },
      async getUser(){
         this.loading = true
         try{
            const res = await this.fetchUser()
            this.items = res.data.map(item=>({
               id : item.id,
               name: item.name,
               email: item.email,
               role: this.role
            }))
         }catch(err){
            console.log(err)
         }this.loading = false
      }
   },
   mounted() {
      this.getUser()
   },
}
</script>